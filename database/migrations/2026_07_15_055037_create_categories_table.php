<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Seed default categories
        DB::table('categories')->insert([
            [
                'name' => 'Video Production',
                'slug' => 'video',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vertical Reels',
                'slug' => 'reels',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graphic Design',
                'slug' => 'graphics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
