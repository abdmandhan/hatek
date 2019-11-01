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
}
