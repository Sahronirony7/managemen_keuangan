<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        /**
         * ✅ SUPER ADMIN BYPASS ALL PERMISSIONS
         * Laravel 12 + Filament v4 + Shield compatible
         */
        Gate::before(function ($user, $ability) {
            if ($user?->hasRole('Super Admin')) {
                return true;
            }
            return null;
        });
    }
}
