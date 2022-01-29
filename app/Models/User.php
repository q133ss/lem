<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $with = ['role'];
    protected $fillable = [ 'name', 'email', 'password'];
    protected $hidden = [ 'password', 'remember_token' ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
