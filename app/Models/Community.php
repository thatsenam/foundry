<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Community extends Model
{

    use Sluggable;

    protected $appends = ['avatar_url', 'unread', 'join_community', 'community_user_count', 'post_count'];


    protected $fillable = [
        'name',
        'avatar',
        'description',
        'user_id'
    ];


    protected $dates = [];


    protected $casts = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function getAvatarUrlAttribute()
    {
        return asset('storage/' . $this->avatar);

    }

    public function getUnreadAttribute()
    {
        return rand(0, 5);

    }

    public function getJoinCommunityAttribute()
    {
        $list = CommunityUser::where('community_id', $this->id)->where('user_id', Auth::id())->first();

        if ($list) {
            return true;
        }

        return false;
    }

    public function getCommunityUserCountAttribute()
    {
        return CommunityUser::where('community_id', $this->id)->get()->count();
    }

    public function getPostCountAttribute()
    {
        return Post::where('community_id', $this->id)->get()->count();
    }

    public function getDescriptionAttribute($description)
    {
        $d = $description;
        if ($description == 'null' || $description == 'undefined') {
            $d = null;
        }
        return $d;
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
