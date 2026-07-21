<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'image_path',
        'video_id',
        'video_path',
        'is_featured',
        'is_vertical_reel',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_vertical_reel' => 'boolean',
    ];

    /**
     * Get the category details for this project.
     */
    public function categoryDetails()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }
}
