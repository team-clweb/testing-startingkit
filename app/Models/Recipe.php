<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'dish_id',
        'instructions',
    ];

//    public function ingredients(): BelongsToMany
//    {
//        return $this->recipe(Ingredient::class)
//            ->withPivot(['quantity']);
//    }
    public function ingredients(): BelongsToMany{
        return $this->belongsToMany(Ingredient::class)->withPivot(['quantity']);
    }
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
