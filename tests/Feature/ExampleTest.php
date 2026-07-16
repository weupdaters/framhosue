<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Service;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_shows_dynamic_services(): void
    {
        $service = Service::create([
            'title' => 'Test Custom Service Description',
            'service_code' => '99 - TEST',
            'description' => 'This is a test description of dynamic service.',
            'video_id' => 'abc12345678',
            'image_path' => 'test_service.png',
            'order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Test Custom Service Description');
        $response->assertSee('This is a test description of dynamic service.');
    }

    public function test_admin_can_upload_project_with_image(): void
    {
        $user = User::factory()->create();

        // Ensure category exists
        Category::firstOrCreate([
            'slug' => 'video'
        ], [
            'name' => 'Video Production'
        ]);

        $imageFile = UploadedFile::fake()->image('my_cool_project.png');

        $response = $this->actingAs($user)->post(route('admin.projects.store'), [
            'title' => 'Test Dynamic Project Title',
            'category' => 'video',
            'description' => 'Test project description content.',
            'image' => $imageFile,
        ]);

        $response->assertRedirect(route('admin.dashboard'));

        $project = Project::where('title', 'Test Dynamic Project Title')->first();
        $this->assertNotNull($project);
        $this->assertStringContainsString('my_cool_project.png', $project->image_path);

        // Verify the file was stored in public/images/
        $storedPath = public_path('images/' . $project->image_path);
        $this->assertTrue(File::exists($storedPath), "Uploaded image was not stored on the backend disk.");

        // Cleanup uploaded file
        if (File::exists($storedPath)) {
            File::delete($storedPath);
        }
    }

    public function test_landing_page_shows_dynamic_settings_from_database(): void
    {
        // Seed settings
        \App\Models\Setting::updateOrCreate(['key' => 'meta_title'], ['value' => 'Unique Site Title 123']);
        \App\Models\Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'dynamic-test@site.com']);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Unique Site Title 123');
        $response->assertSee('dynamic-test@site.com');
    }

    public function test_admin_can_update_settings(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.settings.update'), [
            'meta_title' => 'Updated Meta Title via Post',
            'meta_description' => 'A description of the test site.',
            'meta_keywords' => 'keywords, list',
            'contact_email' => 'updated-admin-email@site.com',
            'contact_phone' => '+1234567890',
            'contact_address' => 'Updated Studio Address, NY',
            'instagram_url' => 'https://instagram.com/myaccount',
            'youtube_url' => 'https://youtube.com/mychannel',
            'linkedin_url' => 'https://linkedin.com/in/myprofile',
            'facebook_url' => 'https://facebook.com/mypage',
            'twitter_url' => 'https://x.com/myaccount',
            'tiktok_url' => 'https://tiktok.com/@myaccount',
            'show_instagram' => '1',
            'show_youtube' => '0',
            'show_twitter' => '1',
        ]);

        $response->assertRedirect(route('admin.settings.index'));

        // Check it persisted in database
        $this->assertEquals('Updated Meta Title via Post', \App\Models\Setting::where('key', 'meta_title')->value('value'));
        $this->assertEquals('updated-admin-email@site.com', \App\Models\Setting::where('key', 'contact_email')->value('value'));
        $this->assertEquals('https://x.com/myaccount', \App\Models\Setting::where('key', 'twitter_url')->value('value'));
        $this->assertEquals('https://tiktok.com/@myaccount', \App\Models\Setting::where('key', 'tiktok_url')->value('value'));
        $this->assertEquals('1', \App\Models\Setting::where('key', 'show_instagram')->value('value'));
        $this->assertEquals('0', \App\Models\Setting::where('key', 'show_youtube')->value('value'));
    }
}
