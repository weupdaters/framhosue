<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Cucine Lube Showroom Campaign',
                'description' => 'Premium brand design for Cucine Lube premium showroom layout.',
                'category' => 'graphics',
                'image_path' => 'project_6.png',
                'video_id' => null,
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Bollywood Controversy Documentary',
                'description' => 'Full production and cinematic editing on the Bollywood Controversy documentary film.',
                'category' => 'video',
                'image_path' => 'project_4.png',
                'video_id' => '1KaDy7BBLweHUU7EyL55GIV1OYAxT8Mbk',
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Wadhwa Wise City Real Estate',
                'description' => 'High-end visual marketing templates for Wadhwa Wise City real estate project.',
                'category' => 'graphics',
                'image_path' => 'project_3.png',
                'video_id' => null,
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Cinematic Travel Vlog Series',
                'description' => 'Dynamic cinematic vertical travel editing optimized for mobile engagement.',
                'category' => 'reels',
                'image_path' => 'project_2.png',
                'video_id' => '10LCP3I_o48B4a5FQAEPSL1WCdTsyQmhs',
                'is_featured' => false,
                'is_vertical_reel' => true,
            ],
            [
                'title' => 'Detective Dotson Game Poster',
                'description' => 'Sleek custom promotional gaming poster artwork for Detective Dotson.',
                'category' => 'graphics',
                'image_path' => 'project_7.png',
                'video_id' => null,
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Esports Showmatch Promo',
                'description' => 'High-pace action esports showmatch promotional trailer.',
                'category' => 'video',
                'image_path' => 'project_5.png',
                'video_id' => '1KaDy7BBLweHUU7EyL55GIV1OYAxT8Mbk',
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'FameHouse Brand Presentation',
                'description' => 'Minimalist corporate proposal slide and brand presentation identity.',
                'category' => 'graphics',
                'image_path' => 'project_1.png',
                'video_id' => null,
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Creative Short Motion Graphic',
                'description' => 'Aesthetic short-form animation reel showing brand dynamics.',
                'category' => 'reels',
                'image_path' => 'project_8.png',
                'video_id' => '18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9',
                'is_featured' => false,
                'is_vertical_reel' => true,
            ],
            [
                'title' => 'Promo Stories Campaign',
                'description' => 'PROMO STORIES - COMMERCIAL & BRAND PROMO EDIT',
                'category' => 'video',
                'image_path' => 'project_10.png',
                'video_id' => '18xUMuIQu_PmSJCCqjxI-gNPflPs4Jxg9',
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'GoRun Club Marathon Promo',
                'description' => 'GORUN CLUB - SOCIAL MEDIA REELS & FITNESS CAMPAIGN',
                'category' => 'video',
                'image_path' => 'project_11.png',
                'video_id' => '10LCP3I_o48B4a5FQAEPSL1WCdTsyQmhs',
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Cinematic Movie Reel #7',
                'description' => '1ST REEL #7 - TRAVEL & CINEMATIC EDIT',
                'category' => 'video',
                'image_path' => 'project_12.png',
                'video_id' => '1VamPZ_no_2ejRjfSzJdlb1PQJnlXNWmx',
                'is_featured' => false,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Social Shorts Engagement Edit',
                'description' => 'Engaging short-form vertical vlog edits matching creative retention templates.',
                'category' => 'reels',
                'image_path' => 'project_9.png',
                'video_id' => '1VamPZ_no_2ejRjfSzJdlb1PQJnlXNWmx',
                'is_featured' => false,
                'is_vertical_reel' => true,
            ],
            [
                'title' => 'Keventers Eid Social Banner',
                'description' => 'I CREATED THIS CONCEPT FOR KEVENTERS ON THE OCCASION ON EID',
                'category' => 'graphics',
                'image_path' => 'keventers_eid.png',
                'video_id' => null,
                'is_featured' => true,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Road Trip Tyre Brand Poster',
                'description' => 'I CREATED THIS CONCEPT EV CHARGER BRAND',
                'category' => 'graphics',
                'image_path' => 'road_trip_tyre.png',
                'video_id' => null,
                'is_featured' => true,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Cellecor Smartwatch Ad',
                'description' => 'I CREATED ASSIGNMENT FOR SMART WATCH BRAND CELLECOR',
                'category' => 'graphics',
                'image_path' => 'smartwatch_cellecor.png',
                'video_id' => null,
                'is_featured' => true,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'EV Charger & Washing Layout',
                'description' => 'WORKED ON EV CHARGER CAMPAIGN',
                'category' => 'graphics',
                'image_path' => 'ev_charger_washing.png',
                'video_id' => null,
                'is_featured' => true,
                'is_vertical_reel' => false,
            ],
            [
                'title' => 'Ratan Tata Tribute Poster',
                'description' => 'I DESIGN THIS POSTER RATAN TATA. THIS POSTER',
                'category' => 'graphics',
                'image_path' => 'project_5.png',
                'video_id' => null,
                'is_featured' => true,
                'is_vertical_reel' => false,
            ],
        ];

        foreach ($projects as $proj) {
            Project::create($proj);
        }
    }
}
