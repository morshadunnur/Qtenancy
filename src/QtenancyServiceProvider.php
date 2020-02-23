<?php

namespace Morshadun\Qtenancy;

use Illuminate\Support\ServiceProvider;

class QtenancyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'morshadun');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'morshadun');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/qtenancy.php', 'qtenancy');

        // Register the service the package provides.
        $this->app->singleton('qtenancy', function ($app) {
            return new Qtenancy;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['qtenancy'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/qtenancy.php' => config_path('qtenancy.php'),
        ], 'qtenancy.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/morshadun'),
        ], 'qtenancy.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/morshadun'),
        ], 'qtenancy.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/morshadun'),
        ], 'qtenancy.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
