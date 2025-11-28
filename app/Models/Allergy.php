<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Allergy extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

}
