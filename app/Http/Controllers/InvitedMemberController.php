<?php

namespace App\Http\Controllers;

use App\Models\InvitedMember;
use Illuminate\Http\Request;

class InvitedMemberController extends Controller
{
    public function verifyToken($token){
        return InvitedMember::where('invite_id' ,$token)->where('status','pending')->first() ?? 'Expired';
    }
    public function acceptInvitation(Request $request){

        $invite = InvitedMember::find($request->id);
        $invite->status = "accepted";
        $invite->save();
        return $invite;
    }
}
