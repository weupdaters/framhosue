<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Project;
use App\Models\Plan;

// Home Page
Route::get('/', function () {
    // Retrieve all projects so that the frontend category filter has access to all content
    $featuredProjects = Project::orderBy('created_at', 'desc')->get();
    $plans = Plan::orderBy('order')->get();
    return view('welcome', compact('featuredProjects', 'plans'));
})->name('home');

// Works Gallery Page
Route::get('/works', function () {
    $projects = Project::orderBy('created_at', 'desc')->get();
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
        
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

// Contact Form Submission (Public)
Route::post('/contact', [AdminController::class, 'submitContact'])->name('contact.submit');
