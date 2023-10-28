<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{

    protected $appends = ['file_url'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_media';

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
        'file',
        'post_id'
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

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file);

    }

}
