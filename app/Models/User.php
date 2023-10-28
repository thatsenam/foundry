<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends = ['avatar_url', 'current_community', 'post_count'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active_status',
        'messenger_color',
        'dark_mode',
        'uid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarUrlAttribute()
    {
        if ($this->community_logo) {
            return asset('storage/' . $this->community_logo);
        }
        return asset('images/user-avatar-80.png');

    }

    public function getCurrentCommunityAttribute()
    {
        $current_community = 0;
        if ($this->current_community_id == null) {
            $current_community = Community::query()->first();
            $user = User::find($this->id);
            $user->current_community_id = $current_community->id;
            $user->save();
        } else {
            $current_community = Community::find($this->current_community_id);
        }
        return $current_community;

    }

    public function getPostCountAttribute()
    {
        return count(Post::query()->where('user_id', $this->id)->get());
    }

    //Add the below function
//    public function messages()
//    {
//        return $this->hasMany(Message::class);
//    }


}
