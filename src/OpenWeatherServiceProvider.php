<?php

namespace Solgenpower\LaravelOpenweather;

use Illuminate\Support\ServiceProvider;

class OpenWeatherServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/openweather.php' => config_path('openweather.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/open-weather.php', 'open-weather');

        $this->app->singleton(
            'laravel-openweather',
            fn () => new OpenWeather(config('open-weather'))
        );
    }
}