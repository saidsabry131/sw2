<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        Gate::define('outh', function (User $user) {
            // Authorization logic: allow only users with the role of 'admin'
            return $user->user_type === 'admin';
        });

        View::composer('layout', function ($view) {
            $view->with('user_id', auth()->id());
        });
    
    
      
    
    }
}
