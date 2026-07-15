<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // Display login form
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // Handle authentication
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Display admin dashboard listing all projects
    public function dashboard()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('projects'));
    }

    // Show create project form
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects_form', compact('categories'));
    }

    // Helper to extract YouTube video ID or Instagram shortcode from a URL
    private function parseVideoId($url)
    {
        if (empty($url)) return null;

        // If it matches an Instagram Reel or Post URL
        if (preg_match('/(?:instagram\.com)\/(?:p|reel)\/([a-zA-Z0-9_-]+)/i', $url, $matches)) {
            return 'instagram:' . $matches[1];
        }

        if (strlen($url) === 11) return $url;

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return $url;
    }

    // Store a new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,slug',
            'description' => 'nullable|string',
            'image' => 'required_without_all:video_id,video_file|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Optional if video is supplied
            'video_id' => 'nullable|string|max:255',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // Max 50MB
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->video_id = $this->parseVideoId($request->video_id);
        $project->is_featured = $request->has('is_featured');
        $project->is_vertical_reel = $request->has('is_vertical_reel');

        // Handle Image Upload directly into public/images/
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $project->image_path = $filename;
        } else {
            $project->image_path = 'default_video_thumbnail.png';
        }

        // Handle Video File Upload directly into public/videos/
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $filename);
            $project->video_path = $filename;
        }

        $project->save();

        return redirect()->route('admin.dashboard')->with('success', 'Project added successfully!');
    }

    // Show edit project form
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects_form', compact('project', 'categories'));
    }

    // Update an existing project
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'video_id' => 'nullable|string|max:255',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', // Max 50MB
        ]);

        $project->title = $request->title;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->video_id = $this->parseVideoId($request->video_id);
        $project->is_featured = $request->has('is_featured');
        $project->is_vertical_reel = $request->has('is_vertical_reel');

        // Handle new Image Upload
        if ($request->hasFile('image')) {
            // Delete old file if it exists and is not a seeded default
            $oldPath = public_path('images/' . $project->image_path);
            if (File::exists($oldPath) && !in_array($project->image_path, ['default_video_thumbnail.png', 'project_1.png', 'project_2.png', 'project_3.png', 'project_4.png', 'project_5.png', 'project_6.png', 'project_7.png', 'project_8.png', 'project_9.png', 'project_10.png', 'project_11.png', 'project_12.png', 'keventers_eid.png', 'road_trip_tyre.png', 'smartwatch_cellecor.png', 'ev_charger_washing.png'])) {
                File::delete($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $project->image_path = $filename;
        }

        // Handle new Video File Upload
        if ($request->hasFile('video_file')) {
            // Delete old video if it exists
            if ($project->video_path) {
                $oldVideoPath = public_path('videos/' . $project->video_path);
                if (File::exists($oldVideoPath)) {
                    File::delete($oldVideoPath);
                }
            }

            $file = $request->file('video_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $filename);
            $project->video_path = $filename;
        }

        $project->save();

        return redirect()->route('admin.dashboard')->with('success', 'Project updated successfully!');
    }

    // Delete a project
    public function delete(Project $project)
    {
        // Delete image file if exists and not seeded default
        $oldPath = public_path('images/' . $project->image_path);
        if (File::exists($oldPath) && !in_array($project->image_path, ['default_video_thumbnail.png', 'project_1.png', 'project_2.png', 'project_3.png', 'project_4.png', 'project_5.png', 'project_6.png', 'project_7.png', 'project_8.png', 'project_9.png', 'project_10.png', 'project_11.png', 'project_12.png', 'keventers_eid.png', 'road_trip_tyre.png', 'smartwatch_cellecor.png', 'ev_charger_washing.png'])) {
            File::delete($oldPath);
        }

        // Delete video file if exists
        if ($project->video_path) {
            $oldVideoPath = public_path('videos/' . $project->video_path);
            if (File::exists($oldVideoPath)) {
                File::delete($oldVideoPath);
            }
        }

        $project->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // Categories CRUD Listing
    public function categoriesIndex()
    {
        $categories = Category::withCount('projects')->orderBy('created_at', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    // Store a new category
    public function categoriesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ]);

        $slug = $request->slug ?: \Illuminate\Support\Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    // Show category edit form (inline layout)
    public function categoriesEdit(Category $category)
    {
        $categories = Category::withCount('projects')->orderBy('created_at', 'desc')->get();
        return view('admin.categories', compact('categories', 'category'));
    }

    // Update category
    public function categoriesUpdate(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function categoriesDelete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }

    // Public AJAX submit contact form
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been received! We will get back to you shortly.',
        ]);
    }

    // List all contact queries for Admin
    public function messagesIndex()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('messages'));
    }

    // Toggle message read/unread status
    public function messagesToggleRead(Contact $contact)
    {
        $contact->is_read = !$contact->is_read;
        $contact->save();
        return redirect()->route('admin.messages.index')->with('success', 'Message status updated successfully!');
    }

    // Delete contact query
    public function messagesDelete(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }

    // List all plans for Admin
    public function plansIndex()
    {
        $plans = Plan::orderBy('order')->get();
        return view('admin.plans_index', compact('plans'));
    }

    // Show plan creation form
    public function plansCreate()
    {
        return view('admin.plans_form');
    }

    // Save plan
    public function plansStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'duration' => 'required|string|max:50',
            'features_text' => 'required|string',
            'order' => 'required|integer',
        ]);

        // Parse features_text (split by newline and remove empty entries)
        $features = array_filter(array_map('trim', explode("\n", $request->features_text)));

        Plan::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'order' => $request->order,
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully!');
    }

    // Show plan edit form
    public function plansEdit(Plan $plan)
    {
        // Join features into a string with newlines
        $features_text = implode("\n", $plan->features ?? []);
        return view('admin.plans_form', compact('plan', 'features_text'));
    }

    // Update plan
    public function plansUpdate(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'duration' => 'required|string|max:50',
            'features_text' => 'required|string',
            'order' => 'required|integer',
        ]);

        $features = array_filter(array_map('trim', explode("\n", $request->features_text)));

        $plan->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'features' => array_values($features),
            'is_popular' => $request->has('is_popular'),
            'order' => $request->order,
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully!');
    }

    // Delete plan
    public function plansDelete(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully!');
    }
    // Edit website settings
    public function settingsEdit()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->all();
        return view('admin.settings', compact('settings'));
    }

    // Update website settings
    public function settingsUpdate(Request $request)
    {
        $data = $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_address' => 'required|string|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'carousel_subtitle' => 'nullable|string|max:255',
            'carousel_title' => 'nullable|string|max:255',
            'carousel_desc' => 'nullable|string',
            'carousel_cta_text' => 'nullable|string|max:255',
        ]);

        foreach ($data as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
