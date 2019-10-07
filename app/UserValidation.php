<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserValidation extends Model
{
    protected $fillable = [
        'nim','name'
    ];

    public function setUsed(){
        $this->attributes['isUsed'] = 1;
        self::save();
    }

}
