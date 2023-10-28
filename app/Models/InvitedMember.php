<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitedMember extends Model
{
    use HasFactory;

    protected $appends = ['sender', 'community', 'join_link'];


    public function getSenderAttribute()
    {
        return User::find($this->invited_by);
    }
    public function getCommunityAttribute()
    {
        return Community::find($this->community_id);
    }

    public function getJoinLinkAttribute()
    {
         $domain = env('APP_DOMAIN', 'https://foundry.chat/');
        return $link =  $domain . '/#/register/?token=' .$this->invite_id;
    }
}
