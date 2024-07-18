<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickname', 'description', 'pictures', 'phone_number', 'age', 'caton', 'city', 'service', 'origin', 'type', 'videos','hair_color', 'hair_length', 'brest_size', 'height', 'weight', 'build', 'smoker', 'languages_spoken','address', 'outcall', 'incall', 
        'whatsapp_number', 'availibility','parking', 'disabled', 'accepts_couples', 'elderly', 'air_conditioned', 'rates_in_chf', 'currencies_accepted', 'payment_methods'
    ];
}
