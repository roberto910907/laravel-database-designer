<?php

namespace DBDesigner;

use Illuminate\Support\ServiceProvider;

class DatabaseDesignerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
        $this->defineAssetPublishing();
        $this->offerPublishing();
        $this->registerCommands();
    }

    /**
     * Set up the configuration for Database Designer.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/db-designer.php', 'db-designer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('DB_DESIGNER_PATH')) {
            define('DB_DESIGNER_PATH', realpath(__DIR__.'/../'));
        }

        $this->configure();
    }

    /**
     * Register the Database Designer routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * Register the Database Designer resources.
     *
     * @return void
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'db-designer');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            DB_DESIGNER_PATH.'/public' => public_path('vendor/db-designer'),
        ], ['db-designer-assets', 'laravel-assets']);
    }

    /**
     * Set up the resource publishing groups for Database Designer.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/db-designer.php' => config_path('db-designer.php'),
            ], 'db-designer-config');
        }
    }

    /**
     * Register the Database Designer Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\InstallCommand::class,
                Console\Commands\PublishCommand::class,
            ]);
        }
    }
}
