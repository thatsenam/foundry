<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $appends = ['react', 'comment', 'post_date', 'post_media', 'is_react', 'is_bookmark','category'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
        'name',
        'body',
        'user_id',
        'community_id',
        'category_id'
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
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the community for this model.
     *
     * @return App\Models\Community
     */
    public function community()
    {
        return $this->belongsTo('App\Models\Community', 'community_id');
    }

    public function getReactAttribute()
    {
        return React::where('type', 'App\Models\Post')->where('type_id', $this->id)->get()->count();
    }


    public function getCommentAttribute()
    {
        return PostComment::where('post_id', $this->id)->get();
    }

    public function getPostMediaAttribute()
    {
        return PostMedia::where('post_id', $this->id)->get();
    }

    public function getPostDateAttribute()
    {
        $text = "";
        if (today()->toDateString() == $this->created_at->toDateString() || $this->created_at->isYesterday()) {
            $text = $this->created_at->diffForHumans();
        } else {
            $text = $this->created_at->format('d-m-Y h:i a');
        }
        return $text;

    }

    public function getIsReactAttribute()
    {
        $_data = React::where('type', Post::class)->where('type_id', $this->id)->where('user_id', auth()->id())->first();
        if ($_data != null) {
            return true;
        }
        return false;
    }

    public function getCategoryAttribute()
    {
        $record = null;
        if ($this->category_id != null) {
            $record = Category::find($this->category_id);
        }

        return $record;
    }

    public function getIsBookmarkAttribute()
    {

        $_data = Bookmark::where('type', Post::class)->where('bookmark_id', $this->id)->where('user_id', auth()->id())->first();

        if ($_data != null) {
            return true;
        }
        return false;
    }

}
