<?php

namespace erfanmomeniii\magicpolicy\providers;

use erfanmomeniii\magicpolicy\services\MagicPolicyService;
use Illuminate\Support\ServiceProvider;

class MagicPolicyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('magicpolicy', function () {
            return new MagicPolicyService();
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'magic-policy-migrations');

    }
}
