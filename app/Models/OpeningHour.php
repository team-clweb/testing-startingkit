<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = [
        'day',
        'open',
        'close',
        'closed'
    ];

    //code van https://stackoverflow.com/questions/35092084/laravel-model-protected-dateformat-how-to-remove-seconds
    //zodat de secondes weg worden gehaald van de openingstijden
    public function getOpenAttribute($value)
    {
        return $this->asDateTime($value)->format('H:i');
    }

    public function getCloseAttribute($value)
    {
        return $this->asDateTime($value)->format('H:i');
    }

}

