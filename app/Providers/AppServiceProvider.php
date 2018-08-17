<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.debug') || app()->environment('local')) {
            $localProviders = config('app.local_providers', []);
            foreach ($localProviders as $provider) {
                $this->app->register($provider);
            }
        }
    }
}
