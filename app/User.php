<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'rut', 'password', 'role'
    ];


    protected $hidden = [
        'password','remember_token'
    ];

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function hasRole($role)
    {
        return $this->role == $role;
    }

}
