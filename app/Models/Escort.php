<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Escort extends Authenticatable implements MustVerifyEmail // Changed to MustVerifyEmail
{
    use Notifiable, CanResetPassword;
    // use HasFactory;
    protected $fillable = [
        'nickname',
        'pictures',
        'phone_number',
        'email',
        'password',
        'age',
        'canton',
        'city',
        'services',
        'origin',
        'type',
        'text_description',
        'video',
        'hair_color',
        'hair_length',
        'breast_size',
        'height',
        'weight',
        'build',
        'smoker',
        'language_spoken',
        'address',
        'outcall',
        'incall',
        'whatsapp_number',
        'availability',
        'parking',
        'disabled',
        'accepts_couples',
        'elderly',
        'air_conditioned',
        'rates_in_chf',
        'currencies_accepted',
        'payment_method',
        'agency_id',
        'profile_pic',
        'original_password',
        'status',
        'is_certified',
        'is_caution',
        'is_premium',
    ];

    protected $casts = [
        'pictures' => 'array',
        'services' => 'array',
        'video' => 'array',
        'language_spoken' => 'array',
        'availability' => 'array',
        'currencies_accepted' => 'array',
        'payment_method' => 'array',
        'smoker' => 'boolean',
        'outcall' => 'boolean',
        'incall' => 'boolean',
        'parking' => 'boolean',
        'disabled' => 'boolean',
        'accepts_couples' => 'boolean',
        'elderly' => 'boolean',
        'air_conditioned' => 'boolean',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers()
    {
    return $this->belongsToMany(User::class, 'follows', 'escort_id', 'user_id')
    ->withTimestamps();
    }

 }
