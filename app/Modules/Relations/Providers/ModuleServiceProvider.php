<?php

namespace App\Modules\Relations\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'relations');
        $this->registerConfig();
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'relations');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'relations');
    }

    /**
     * Register the service providers.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('relations.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'relations'
        );
    }



}
