<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','university','gender','job','age'
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    public function admin_request(){
        return $this->hasOne('App\AdminRequest');
    }
}

