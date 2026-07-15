<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'meta_title' => 'Vibhu | Portfolio',
            'meta_description' => 'Fame House Media is a creative production and branding studio passionate about turning ideas into powerful visual experiences. We blend strategy, storytelling, and cinematic quality to help brands connect, inspire, and stand out.',
            'meta_keywords' => 'fame house media, video production, vertical reels, graphic design, branding, content strategy, cinematic editing, youtube production, vibhu portfolio',
            'contact_email' => 'famehousemedia@gmail.com',
            'contact_phone' => '+91 98765 43210',
            'contact_address' => 'New Delhi, India',
            'instagram_url' => 'https://www.instagram.com/famehousemedia/',
            'youtube_url' => 'https://www.youtube.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'facebook_url' => 'https://www.facebook.com/',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
