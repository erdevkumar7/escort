<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agency extends Authenticatable implements CanResetPasswordContract
{
    use  CanResetPassword,HasApiTokens, Notifiable;
    // use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "phone_number",
        "address",
        "password",
        "counter",
        ] ;
}
