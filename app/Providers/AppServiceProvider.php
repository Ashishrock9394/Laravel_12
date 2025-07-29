<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use Illuminate\Pagination\Paginator;
use App\Http\Middleware\IsSuperadmin;

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
        //
        Route::aliasMiddleware('admin', IsAdmin::class);
        Route::aliasMiddleware('superadmin', IsSuperadmin::class);
        Paginator::useBootstrap();

        
    }
}
