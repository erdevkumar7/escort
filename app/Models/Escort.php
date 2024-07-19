<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    use HasFactory;
    protected $fillable = [
        'nickname',
        'pictures',
        'phone_number',
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
}
