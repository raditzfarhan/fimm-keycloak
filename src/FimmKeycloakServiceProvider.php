<?php

namespace RaditzFarhan\FimmKeycloak;

use Illuminate\Support\ServiceProvider;

class FimmKeycloakServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('fimmkeycloak.php'),
            ], 'fimm-keycloak-config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'fimmkeycloak');

        // Register the main class to use with the facade
        $this->app->singleton('fimm-keycloak', function () {
            return new FimmKeycloak;
        });
    }
}
