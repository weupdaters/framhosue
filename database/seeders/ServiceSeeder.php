<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Commercial & Promo Edits',
                'service_code' => '01 - PROMOS',
                'description' => 'Premium commercial videos, product ads, and promo edits that drive engagement and sales.',
                'video_id' => '18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9',
                'image_path' => 'project_10.png',
                'order' => 1,
            ],
            [
                'title' => 'Reels & Social Media',
                'service_code' => '02 - REELS',
                'description' => 'High-impact, viral vertical reels and shorts optimized for maximum reach and audience growth.',
                'video_id' => '10LCP3I_o48B4a5FQAEPSL1WCdTsyQmhs',
                'image_path' => 'project_11.png',
                'order' => 2,
            ],
            [
                'title' => 'Cinematic Video Editing',
                'service_code' => '03 - CINEMATIC',
                'description' => 'Luxury cinematic styling, advanced color grading, sound design, and storytelling cuts.',
                'video_id' => '1VamPZ_no_2ejRjfSzJdlb1PQJnlXNWmx',
                'image_path' => 'project_12.png',
                'order' => 3,
            ],
            [
                'title' => 'YouTube Production',
                'service_code' => '04 - YOUTUBE',
                'description' => 'Professional long-form video production featuring clean storytelling and motion graphics.',
                'video_id' => '10LCP3I_o48B4a5FQAEPSL1WCdTsyQmhs',
                'image_path' => 'project_11.png',
                'order' => 4,
            ],
            [
                'title' => 'Brand Content Strategy',
                'service_code' => '05 - BRANDING',
                'description' => 'Visual branding and video strategy designed to build strong, memorable brand identities.',
                'video_id' => '18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9',
                'image_path' => 'final_short_form.png',
                'order' => 5,
            ],
            [
                'title' => 'Poster & Promo Graphics',
                'service_code' => '06 - DESIGNS',
                'description' => 'High-end digital flyers, marketing posters, and promotional social media assets.',
                'video_id' => null,
                'image_path' => 'keventers_eid.png',
                'order' => 6,
            ],
        ];

        foreach ($services as $srv) {
            Service::create($srv);
        }
    }
}
