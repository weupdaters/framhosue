<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'features',
        'is_popular',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'order' => 'integer',
        'price' => 'integer',
    ];
}
