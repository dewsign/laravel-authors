<?php

namespace Dewsign\LaravelAuthors\Providers;

use Illuminate\Routing\Router;
use Dewsign\LaravelAuthors\Authorable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->bootViews();
        $this->publishDatabaseFiles();
        $this->bootMorphMap();
        $this->publishConfigs();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Publish configuration file.
     *
     * @return void
     */
    private function publishConfigs()
    {
        $this->publishes([
            $this->getConfigsPath() => config_path('laravel-authors.php'),
        ], 'config');

        $this->mergeConfigFrom($this->getConfigsPath(), 'laravel-authors');
    }
    /**
     * Get local package configuration path.
     *
     * @return string
     */
    private function getConfigsPath()
    {
        return __DIR__.'/../Config/laravel-authors.php';
    }

    /**
     * Load custom views
     *
     * @return void
     */
    private function bootViews()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'laravel-authors');
        $this->publishes([
            __DIR__.'/../Resources/views' => resource_path('views/vendor/laravel-authors'),
        ]);
    }

    private function bootMorphMap()
    {
        Relation::morphMap([
            'author' => Authorable::user(),
        ]);
    }

    private function publishDatabaseFiles()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');

        $this->publishes([
            __DIR__ . '/../Database/migrations' => base_path('database/migrations')
        ], 'migrations');
    }
}
