<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'post_id', 'body'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }

    
}
