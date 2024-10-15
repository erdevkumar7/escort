<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'escort_id',
        'ads_id',
        'time_duration',
        'payment_id',
        'payment_method',
        'amount',
        'currency',
        'status',
    ];
}
