<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            view()->composer('*', function ($view) {
                if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                    $settings = \App\Models\Setting::pluck('value', 'key')->all();
                    $view->with('site_settings', $settings);
                }
            });
        } catch (\Exception $e) {
            // Avoid failing during migrations or CLI commands
        }
    }
}
