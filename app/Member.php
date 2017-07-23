<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable =['username', 'email', 'phone', 'password', 'city_id', 'f_name', 'l_name', 'avater',
        'confirm','approve','bio','	facebook','twitter','google','linkdin'
    ];

    protected $hidden = ['password', 'remember_token'];
}
