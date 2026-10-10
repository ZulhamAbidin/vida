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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('siteLogo', \App\Models\Setting::get('site_logo'));
            $view->with('companyLegalName', \App\Models\Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS'));
        });
    }
}
