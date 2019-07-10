<?php

namespace Admin\Frontend\Providers;

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
            ['namespace' => 'Admin\Frontend\Controllers'],
            function () {
                include __DIR__.'/../Route/web.php';
            }
        );

        // register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web');
    }
}
