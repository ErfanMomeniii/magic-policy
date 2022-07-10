<?php


namespace erfanmomeniii\magicpolicy\ServiceProvider;

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
