<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nim','telp','status','instagram','gender','job','company','kajian','title'
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
        $this->attributes['isVerified'] = 1;
        self::save();
    }

    public function setAngkatan($angkatan){
        $this->attributes['angkatan'] = $angkatan;
        self::save();
    }

    public function post(){
        return $this->hasMany('App\Post','id');
    }
}
