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
//        $this->registerEvents();
        $this->registerRoutes();
//        $this->registerResources();
//        $this->defineAssetPublishing();
//        $this->offerPublishing();
//        $this->registerCommands();
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
}
