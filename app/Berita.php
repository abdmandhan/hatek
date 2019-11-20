<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    protected $fillable = [
        'title', 'body','image'
    ];

    use SoftDeletes;

}
