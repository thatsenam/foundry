<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'channels';

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
        'description',
        'community_id', 'uid'
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
     * Get the community for this model.
     *
     * @return App\Models\Community
     */
    public function community()
    {
        return $this->belongsTo('App\Models\Community', 'community_id');
    }


}
