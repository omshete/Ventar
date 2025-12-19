<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HomeSetting;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Share the first HomeSetting record with all views as $homeSetting
        // Wrap in try/catch to avoid errors when DB or model isn't ready.
        try {
            $homeSetting = HomeSetting::first();
        } catch (\Throwable $e) {
            $homeSetting = null;
        }

        view()->share('homeSetting', $homeSetting);

        require_once app_path('Helpers/ServiceHelper.php');
    }
}
