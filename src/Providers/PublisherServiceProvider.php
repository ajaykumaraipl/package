<?php

namespace Package\Publication\Providers;

use Illuminate\Support\ServiceProvider;

class PublisherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Publish view costant
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'view');
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // register controller
        $this->app->router->group(
            ['namespace' => 'Package\Publication\Controllers'],
            function () {
                include __DIR__.'/../Route/web.php';
            },
        );

        $this->publishes([
                __DIR__.'/../public' => public_path(),
            ], 'public');

        // register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web');
    }
}
