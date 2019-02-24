<?php

namespace JeroenG\DigitalOcean;

use Illuminate\Support\ServiceProvider;

class DigitalOceanServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton(DigitalOcean::class, function ($app) {
            return new DigitalOcean(new Api(config('services.digitalocean.key', env('DO_API_AUTH_KEY'))));
        });
    }
}
