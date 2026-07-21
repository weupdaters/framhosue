<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Project;
use App\Models\Plan;

// Home Page
Route::get('/', function () {
    try {
        \App\Models\Visit::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'referrer' => request()->headers->get('referer'),
            'page_name' => 'home',
        ]);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error("Visit tracking failed: " . $e->getMessage());
    }

    // Retrieve all projects so that the frontend category filter has access to all content
    // Retrieve all projects ordered by sort_order
    $featuredProjects = Project::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->get();
    $plans = Plan::orderBy('order')->get();
    $services = \App\Models\Service::orderBy('order')->get();
    return view('welcome', compact('featuredProjects', 'plans', 'services'));
})->name('home');

// Works Gallery Page
Route::get('/works', function () {
    try {
        \App\Models\Visit::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'referrer' => request()->headers->get('referer'),
            'page_name' => 'works',
        ]);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error("Visit tracking failed: " . $e->getMessage());
    }

    $projects = Project::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->get();
    return view('works', compact('projects'));
})->name('works');

// Admin Panel Routes
Route::prefix('admin')->group(function () {
    // Guest Routes
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Authenticated Routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Projects CRUD
        Route::get('/projects/create', [AdminController::class, 'create'])->name('admin.projects.create');
        Route::post('/projects/store', [AdminController::class, 'store'])->name('admin.projects.store');
        Route::get('/projects/{project}/edit', [AdminController::class, 'edit'])->name('admin.projects.edit');
        Route::post('/projects/{project}/update', [AdminController::class, 'update'])->name('admin.projects.update');
        Route::post('/projects/{project}/delete', [AdminController::class, 'delete'])->name('admin.projects.delete');
        Route::post('/projects/{project}/move-up', [AdminController::class, 'moveUp'])->name('admin.projects.move-up');
        Route::post('/projects/{project}/move-down', [AdminController::class, 'moveDown'])->name('admin.projects.move-down');
        
        // Categories CRUD
        Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
        Route::post('/categories/store', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [AdminController::class, 'categoriesEdit'])->name('admin.categories.edit');
        Route::post('/categories/{category}/update', [AdminController::class, 'categoriesUpdate'])->name('admin.categories.update');
        Route::post('/categories/{category}/delete', [AdminController::class, 'categoriesDelete'])->name('admin.categories.delete');
        
        // Messages management
        Route::get('/messages', [AdminController::class, 'messagesIndex'])->name('admin.messages.index');
        Route::post('/messages/{contact}/read', [AdminController::class, 'messagesToggleRead'])->name('admin.messages.toggle_read');
        Route::post('/messages/{contact}/delete', [AdminController::class, 'messagesDelete'])->name('admin.messages.delete');
        
        // Pricing Plans CRUD
        Route::get('/plans', [AdminController::class, 'plansIndex'])->name('admin.plans.index');
        Route::get('/plans/create', [AdminController::class, 'plansCreate'])->name('admin.plans.create');
        Route::post('/plans/store', [AdminController::class, 'plansStore'])->name('admin.plans.store');
        Route::get('/plans/{plan}/edit', [AdminController::class, 'plansEdit'])->name('admin.plans.edit');
        Route::post('/plans/{plan}/update', [AdminController::class, 'plansUpdate'])->name('admin.plans.update');
        Route::post('/plans/{plan}/delete', [AdminController::class, 'plansDelete'])->name('admin.plans.delete');

        // Services CRUD
        Route::get('/services', [AdminController::class, 'servicesIndex'])->name('admin.services.index');
        Route::get('/services/create', [AdminController::class, 'servicesCreate'])->name('admin.services.create');
        Route::post('/services/store', [AdminController::class, 'servicesStore'])->name('admin.services.store');
        Route::get('/services/{service}/edit', [AdminController::class, 'servicesEdit'])->name('admin.services.edit');
        Route::post('/services/{service}/update', [AdminController::class, 'servicesUpdate'])->name('admin.services.update');
        Route::post('/services/{service}/delete', [AdminController::class, 'servicesDelete'])->name('admin.services.delete');
        
        // Settings CRUD
        Route::get('/settings', [AdminController::class, 'settingsEdit'])->name('admin.settings.index');
        Route::post('/settings', [AdminController::class, 'settingsUpdate'])->name('admin.settings.update');
        
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

// Contact Form Submission (Public)
Route::post('/contact', [AdminController::class, 'submitContact'])->name('contact.submit');
