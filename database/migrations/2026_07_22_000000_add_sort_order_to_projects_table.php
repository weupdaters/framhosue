<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('sort_order')->default(0);
        });

        // Initialize sort_order values for existing projects
        $projects = \App\Models\Project::orderBy('created_at', 'desc')->get();
        $order = 1;
        foreach ($projects as $project) {
            $project->sort_order = $order++;
            $project->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
