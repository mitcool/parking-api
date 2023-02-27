<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Vehicle;
use App\Models\Parking;
use App\Observers\VehicleObserver;
use App\Observers\ParkingObserver;


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
        Vehicle::observe(VehicleObserver::class);
        Parking::observe(ParkingObserver::class);
    }
}
