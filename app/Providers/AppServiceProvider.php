<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Gate;
use App\Models\GraduationProject;
use App\Policies\GraduationProjectPolicy;

class AppServiceProvider extends ServiceProvider
{
=======

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
    public function register(): void
    {
        //
    }

<<<<<<< HEAD
    public function boot(): void
    {
        Gate::policy(GraduationProject::class, GraduationProjectPolicy::class);
    }
}
=======
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
>>>>>>> ef9f940bf4530f334665541a23c94f431fa3ddb1
