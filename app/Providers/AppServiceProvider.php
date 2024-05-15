<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
    

        Validator::extend('valid_department', function ($attribute, $value, $parameters, $validator) {
            // Define valid departments
            $validDepartments = ['CS', 'IS', 'IT'];

            // Check if the value is in the list of valid departments
            return in_array($value, $validDepartments);
        }, 'The :attribute must be a valid department (CS, IS, IT).');

    
      
    
    }
}
