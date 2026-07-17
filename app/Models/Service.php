<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'service_code',
        'description',
        'video_id',
        'image_path',
        'order',
        'icon_type',
    ];
}
