<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'gender',
        'description',
        'location',
        'status',
        'image',
    ];

    protected $casts = [
        'age' => 'integer',
    ];
}

