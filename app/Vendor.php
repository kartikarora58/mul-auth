<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use notifiable;
    protected $fillable=['name','email','password'];
    protected $hidden=['password','remember_tokem'];
}
