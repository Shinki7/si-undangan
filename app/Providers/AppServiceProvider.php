<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfUnauthenticated;
use Illuminate\Auth\Middleware\Authenticate;

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
            Authenticate::redirectUsing(function ($request) {
            return route('admin.login'); // Sesuaikan dengan nama route login yang benar
        });
    }
}
