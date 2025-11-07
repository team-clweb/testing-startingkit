<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'firstname',
        'infix',
        'lastname',
        'email',
        'message',
    ];
}

