<?php

namespace Rifrocket\LaravelCmsV2\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Rifrocket\LaravelCmsV2\Commands\LbsClearOldRecords;
use Rifrocket\LaravelCmsV2\Exceptions\LbsExceptionHandler;
use Rifrocket\LaravelCmsV2\LaravelCmsV2;
use Rifrocket\LaravelCmsV2\Middlewares\LbsRedirectIfAuthenticated;

class LaravelCmsV2ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(){
        /*
         * Optional methods to load your package assets
         */
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'LbsViews');
        $this->loadMigrationsFrom(__DIR__.'/../Databases/migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/lbs_admin_routes.php');


        if ($this->app->runningInConsole()) {

            // Publishing the config.
            $this->publishes([
                __DIR__.'/../Configs/config.php' => config_path('laravel-cms-v2.php'),
            ], 'lbs:config');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../Resources/assets' => public_path('vendor/laravel-cms-v2'),
            ], 'lbs:assets');


            $this->publishes([
                __DIR__.'/../Resources/views/backend/layouts' =>base_path('resources/views/vendor/LbsViews/backend/layouts'),
                __DIR__.'/../Resources/views/backend/dashboards' =>base_path('resources/views/vendor/LbsViews/backend/dashboards'),
                __DIR__.'/../Resources/views/auth/layouts' =>base_path('resources/views/vendor/LbsViews/auth/layouts'),
            ], 'lbs:admin_layouts');

            // Registering package commands.
            $this->commands([
                LbsClearOldRecords::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register(){
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../Configs/config.php', 'laravel-cms-v2');
        $this->mergeAuthFileFrom(__DIR__ . '/../Configs/auth.php', 'auth');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-cms-v2', function () {
            return new LaravelCmsV2;
        });

        //Register middelwares
        $this->loadMiddlewares();

        //Register package's livewire compenent
        $this->loadLivewireComponent();

        //Overwrite core exception file
        $this->registerExceptionHandler();
    }

    /*========================================================================================================*/


    protected function loadLivewireComponent(){
        LivewireComponentProvider::adminComponentCollection();
        LivewireComponentProvider::frontComponentCollection();
        LivewireComponentProvider::universalComponentCollection();
    }

    protected function mergeAuthFileFrom($path, $key){
        $original = $this->app['config']->get($key, []);
        $this->app['config']->set($key,lbs_multi_array_merge(require $path, $original));
    }

    protected function loadMiddlewares(){
        app('router')->aliasMiddleware('auth_redirect', LbsRedirectIfAuthenticated::class);
    }

    // Overwirte Exception Handler /app/Exceptions/Handler.php
    protected function registerExceptionHandler(){
        App::singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            LbsExceptionHandler::class
        );
    }
}
