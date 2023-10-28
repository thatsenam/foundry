<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{

    protected $appends = ['react', 'replies'];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_comments';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'post_id',
        'user_id',
        'post_comment_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the post for this model.
     *
     * @return App\Models\Post
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the postComment for this model.
     *
     * @return App\Models\PostComment
     */
    public function postComment()
    {
        return $this->belongsTo('App\Models\PostComment', 'post_comment_id');
    }


    public function getReactAttribute()
    {
        return rand(1, 5);
    }

    public function getRepliesAttribute()
    {

        $replies = PostComment::with(['user'])->where('post_comment_id', $this->id)->get();

        return $replies;
    }

}
