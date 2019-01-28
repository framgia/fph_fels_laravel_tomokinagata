<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Lesson;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'avatar', 'admin', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function lessons()
    {
       return $this->hasMany('App\Lesson');
    }
}
