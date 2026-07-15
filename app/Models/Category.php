<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get all projects belonging to this category.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'category', 'slug');
    }
}
