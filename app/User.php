<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nim','gender','photo','angkatan','is_tingkat_akhir','is_mahasiswa'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setVerify(){
        $this->attributes['is_verified'] = 1;
        self::save();
    }

    public function post(){
        return $this->hasMany('App\Post','id');
    }

    public function comment(){
        return $this->hasMany('App\Comment','id');
    }

    public function like(){
        return $this->hasMany('App\Like','id');
    }

    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }
}
