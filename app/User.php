<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;    

    //Campos accesibles
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

   //Campos ocultos
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    //Detalle del usuario
    function detail(){
        return $this->hasOne(User_Detail::class, 'user_id', 'id');
    }
    
}
