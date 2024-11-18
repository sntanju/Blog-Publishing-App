<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Policies\OrderPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



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
        Gate::policy(Order::class, OrderPolicy::class);

        // Define a simple Gate for admin role
        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });

        // Or define a Gate that checks a specific condition
        Gate::define('update-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });
       
    }
}
