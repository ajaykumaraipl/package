<?php

namespace Package\Publication\Providers;

use Illuminate\Support\ServiceProvider;

class PublicationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Publish view costant
        // $this->loadViewsFrom(__DIR__.'/../Resources/views', 'view');
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
            __DIR__.'/../Resources/views' => resource_path('views'),
        ]);

        // register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web');
    }
}
