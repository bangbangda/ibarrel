<?php

namespace Bangbangda\Ibarrel;

use Bangbangda\Ibarrel\Ibarrel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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

        $this->app->bind('Ibarrel', function ($app) {
            return new Ibarrel($app['config']->get('ibarrel'));
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
            __DIR__.'/config/ibarrel.php' => config_path('ibarrel.php'),
        ]);
    }

    public function provides()
    {
        return [Ibarrel::class];
    }
}
