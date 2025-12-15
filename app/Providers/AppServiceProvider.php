<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Configure rate limiting (moved from RouteServiceProvider)
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Re-suppress PHP 8.4 deprecation warnings after Laravel's bootstrap
        // Laravel's HandleExceptions sets error_reporting(-1), so we need to override it
        error_reporting(E_ALL & ~E_DEPRECATED);
        
        // Ensure our error handler is active to suppress deprecation warnings
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            // Suppress deprecation warnings
            if ($errno === E_DEPRECATED) {
                return true; // Suppress the warning
            }
            // Let other errors through to Laravel's handler
            return false;
        }, E_ALL & ~E_DEPRECATED);
    }
}
