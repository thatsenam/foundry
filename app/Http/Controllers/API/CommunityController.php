<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\CommunitiesController;
use App\Http\Controllers\Controller;
use App\Jobs\SendInviteMail;
use App\Jobs\SendInviteMailJobs;
use App\Mail\InviteCommunity;
use App\Models\Community;
use App\Models\CommunityUser;
use App\Models\InvitedMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommunityController extends CommunitiesController
{

    public function index()
    {
        $joinList = CommunityUser::query()->where('user_id', auth()->user()->id)->get()->pluck('community_id');
//        dd($joinList);
        return Community::find($joinList)->toArray();
    }

    public function browse_communities()
    {
        return Community::all()->toArray();
    }

    public function store(Request $request)
    {


        $data = $this->getData($request);

        $community = new Community();
        $community->name = $data['name'];
        $community->avatar = $data['avatar'];
        $community->style = $data['style'];
        $community->description = $data['description'];
        $community->user_id = auth()->id();
        $community->save();

        CommunityUser::create(['community_id' => $community->id, 'user_id' => $community->user_id]);

        return $community;

    }

    public function update($id, Request $request)
    {

        $data = $this->getData($request);

        $community = Community::find($id);
        $community->name = $data['name'];
        if ($data['avatar'] != 'null') {
            $community->avatar = $data['avatar'];
        }
        $community->description = $data['description'];
        $community->color = $data['color'];
        $community->style = $data['style'];
        $community->user_id = auth()->id();
        $community->save();


        return $community;

    }

    public function joinCommunity($community_id)
    {
        $community = Community::find($community_id);
        $communityUser = CommunityUser::create(['community_id' => $community->id, 'user_id' => auth()->user()->id]);

        return $communityUser;
    }

    public function leaveCommunity($community_id)
    {
        CommunityUser::query()
            ->where(['community_id' => $community_id, 'user_id' => auth()->id()])
            ->delete();

        $community = Community::find($community_id);

        return $community;
    }

    public function inviteMember(Request $request)
    {

        $invite = new InvitedMember;
        $invite->email = $request->email;
        $invite->community_id = $request->current_community;
        $invite->invited_by = auth()->id();
        $invite->status = "pending";
        $invite->invite_id = \Str::uuid();
        $invite->save();

        dispatch(new SendInviteMailJobs($invite));

        return $invite;
    }


}
