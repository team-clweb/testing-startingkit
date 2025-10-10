<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'unit'
    ];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class)
            ->withPivot(['quantity']);
    }
    public function stock(): HasOne
    {
        return $this->HasOne(Stock::class);
    }
}
