<?php

namespace PrageethPeiris\SiteAllocator;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PrageethPeiris\SiteAllocator\Http\Transporter\DefaultTransporter;
use PrageethPeiris\SiteAllocator\Http\Transporter\IDataTransport;
use Spatie\LaravelData\Support\DataConfig;

class SiteAllocatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');


        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('site-allocator.php'),
            ], 'config');

        }


            $this->registerRoutes();







    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'site-allocator');

        // Register the main class to use with the facade
        $this->app->singleton('site-allocator', function () {
            return new SiteAllocator;
        });

//bind laravel data package data config
        $this->app->bind(DataConfig::class,function (){
            return new DataConfig(config('site-allocator.spatie-laravel-data-configs'));
        });

        //bind how  what should be the data  format in response
        $this->app->bind(IDataTransport::class,function(){

        return   App::make(config('site-allocator.dataTransporter'));

        });

    }


    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }


    protected function routeConfiguration()
    {
        return [
            'prefix' => config('site-allocator.prefix'),
            'middleware' => config('site-allocator.middleware'),
        ];
    }


}
