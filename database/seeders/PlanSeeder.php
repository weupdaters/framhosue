<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'CREATOR-LITE',
            'price' => 199,
            'duration' => '/mo',
            'features' => [
                '8 Reels / Shorts edits',
                'High-retention hooks',
                '1080p Full HD output',
                'Basic color grading'
            ],
            'is_popular' => false,
            'order' => 1,
        ]);

        Plan::create([
            'name' => 'PRO-CREATOR',
            'price' => 499,
            'duration' => '/mo',
            'features' => [
                '15 Reels / Shorts edits',
                '2 YouTube Long-form edits',
                'Advanced color grading',
                'Motion graphics & text animations',
                'Priority delivery'
            ],
            'is_popular' => true,
            'order' => 2,
        ]);

        Plan::create([
            'name' => 'BRAND-AGENCY',
            'price' => 999,
            'duration' => '/mo',
            'features' => [
                'Unlimited vertical edits',
                '5 Cinematic YouTube edits',
                'Custom branding & templates',
                'Dedicated creator manager',
                'Priority delivery'
            ],
            'is_popular' => false,
            'order' => 3,
        ]);
    }
}
