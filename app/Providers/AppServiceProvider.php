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
            $logo = \App\Models\Setting::get('site_logo');
            if ($logo && !\Illuminate\Support\Facades\Storage::disk('public')->exists($logo)) {
                $logo = null;
            }
            $view->with('siteLogo', $logo);

            $heroImage = \App\Models\Setting::get('hero_image');
            if ($heroImage && !\Illuminate\Support\Facades\Storage::disk('public')->exists($heroImage)) {
                $heroImage = null;
            }
            $view->with('heroImage', $heroImage);

            $view->with('companyLegalName', \App\Models\Setting::get('company_legal_name', 'PT PERDANA MEGA TRANS'));
        });
    }
}
