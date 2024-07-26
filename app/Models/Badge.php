<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "how_is_it_applied",
        "hexa_color",
        "description",
        "design_inspiration",
    ];
}
