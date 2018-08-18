<?php

namespace App\Providers;

use App\Services\WeatherAPI;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('weather', function () {
            return $this->app->make(WeatherAPI::class);
        });
    }
}
