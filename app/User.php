<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
<<<<<<< HEAD
        'name', 'email', 'password',
=======
        'name', 'name_en', 'email', 'password', 'phone1', 'phone2', 'phone3', 'phone',
        //'name', 'name_en', 'email', 'password'
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
