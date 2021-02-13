<?php

namespace IAmKevinMcKee\ManyToMany;

use IAmKevinMcKee\ManyToMany\Commands\GenerateCommand;
use Illuminate\Support\ServiceProvider;

class ManyToManyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'many-to-many');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'many-to-many');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('many-to-many.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/many-to-many'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/many-to-many'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/many-to-many'),
            ], 'lang');*/

            // Registering package commands.
             $this->commands([
                 GenerateCommand::class,
             ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'many-to-many');

        // Register the main class to use with the facade
        $this->app->singleton('many-to-many', function () {
            return new ManyToMany;
        });
    }
}
