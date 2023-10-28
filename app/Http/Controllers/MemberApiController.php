<?php

namespace App\Http\Controllers;

use App\Models\CommunityUser;
use App\Models\Follow;
use App\Models\InvitedMember;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\u;

class MemberApiController extends Controller
{
    public function index($community_id)
    {

        $usersCommunity = CommunityUser::where('community_id',$community_id)->pluck('user_id');
        $users = User::find($usersCommunity);

        $invited = InvitedMember::where('community_id',$community_id)->where('status','pending')->get();

        $collection = $users;

        $merged = $collection->merge($invited);

        return $merged;
    }

        public function newMember($community_id)
    {

        $usersCommunity = CommunityUser::where('community_id',$community_id)->pluck('user_id');

        $to_id = auth()->id();
        $user_ids = array_filter($usersCommunity->toArray(), function ($user_id) use ($to_id) {
            return $user_id != $to_id;
        });

        $users = User::find($user_ids)->take(5);


        return $users;
    }



    public function following($user_id)
    {

        $user_id_list = Follow::query()->where('followed_by', $user_id)->pluck('followed_to')->toArray();
        return User::find($user_id_list);
    }
    public function remove_member(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        return CommunityUser::query()->where('user_id',$user->id)
            ->where('community_id',$request->community_id)->first()->delete() ;
    }
    public function removeInvite(Request $request)
    {
        return InvitedMember::query()->where('email',$request->email)->where('community_id',$request->community_id)->first()->delete();
    }

    public function follow(Request $request)
    {

        $followed_by = $request->followed_by;
        $followed_to = $request->followed_to;
        $follow = Follow::create(['followed_by' => $followed_by, 'followed_to' => $followed_to]);
        return $follow;
    }

    public function unfollow(Request $request)
    {
        $followed_by = $request->followed_by;
        $followed_to = $request->followed_to;
        Follow::query()->where(['followed_by' => $followed_by, 'followed_to' => $followed_to])->delete();
        return [];
    }

    public function getTopMember()
    {

        $users = User::inRandomOrder()->limit(4)->get();

        return $users;
    }

    public function getUserInfo($user_id)
    {

        $users_post = Post::query()->where('user_id', $user_id)->get();

        return $users_post;
    }

    public function updateProfile(Request $request)
    {

        $user = User::find($request->id);
        if ($request->avatar != "blank") {
            $user->community_logo = \request()->avatar->store('uploads', 'public');
        }
        if ($request->name) $user->name = $request->name;
        if ($request->email) $user->email = $request->email;
        if ($request->password) $user->password = Hash::make($request->password);

        $user->save();

        return $user;
    }


}
