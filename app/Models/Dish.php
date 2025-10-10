<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function recipe(): HasOne
    {
        return $this->hasOne(Recipe::class);
    }
}
