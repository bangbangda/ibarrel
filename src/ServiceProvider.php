<?php

namespace Bangbangda\Ibarrel;

use Bangbangda\Ibarrel\Ibarrel;

class ServiceProvider extends Illuminate\Support\ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configs
        $this->mergeConfigFrom(
            __DIR__ . '/config/ibarrel.php',
            'ibarrel'
        );

        $this->app->bind(Ibarrel::class, function ($app) {
            return new Ibarrel($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('ekko.php'),
        ]);
    }

    public function provides()
    {
        return [Ibarrel::class];
    }
}
