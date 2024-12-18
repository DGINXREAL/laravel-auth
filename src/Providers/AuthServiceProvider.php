<?php

namespace DGINXReal\Auth\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/laravel-auth.php', 'laravel-auth');
    }

    public function boot(): void
    {
        if($this->app->runningInConsole()){
            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/vendor/laravel-auth'),
                __DIR__.'/../../config/laravel-auth.php' => config_path('laravel-auth.php')
            ]);
        }

        //Views
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-auth');

        //Language Files
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'laravel-auth');
    }
}