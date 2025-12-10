<?php

namespace App\Providers;

use App\Models\RegistrationPeriod;
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
        $periodeAktif = RegistrationPeriod::where('is_active', '1')->first();

        // Share ke semua view
        View::share('periodeAktif', $periodeAktif);
    }
}
