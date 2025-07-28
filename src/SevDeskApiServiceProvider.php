<?php

namespace Ameax\SevDeskApi;

use Illuminate\Support\ServiceProvider;

class SevDeskApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sevdesk.php', 'sevdesk'
        );

        $this->app->singleton(SevDesk::class, function ($app) {
            $config = $app['config']->get('sevdesk');
            
            return new SevDesk($config['api_token'] ?? null);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/sevdesk.php' => config_path('sevdesk.php'),
            ], 'sevdesk-config');
        }
    }
}