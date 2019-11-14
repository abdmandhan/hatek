<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'title', 'body','category'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function setBroadcast(){
        $this->attributes['isBroadcast'] = 1;
        self::save();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
