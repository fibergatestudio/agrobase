<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_unveil', 'status', 'role', 'reg_code', 'address', 'phone', 'website', 'contact_name', 'country', 'city', 'messenger', 'activity', 'work_activity', 'logo',
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

    /* Проверка, является ли пользователь администратором */
    public function isAdmin(){
        if($this->role == 'admin')
        {
            return true;
        } else{
            return false;
        }
    }

    public function isConfirmedUser(){
        if($this->role == 'admin' && $this->status == 'confirmed')
        {
            return true;
        } else{
            return false;
        }
    }
}
