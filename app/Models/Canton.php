<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "short_name",
        "description",
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'canton_id');
    }
}
