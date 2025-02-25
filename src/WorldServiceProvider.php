<?php

namespace Khsing\World;

use Illuminate\Support\ServiceProvider;

class WorldServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
        $this->publishSeeds();
        $this->publishModels();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Publish migration file.
     */
    private function publishMigrations()
    {
        // $this->loadMigrationsFrom([__DIR__ . '/../database/migrations/' => base_path('database/migrations')]);
        $this->publishes([__DIR__ . '/../database/migrations/' => base_path('database/migrations')], 'migrations');
    }

    /**
     * Publish seeder file.
     */
    private function publishSeeds()
    {
        $this->publishes([__DIR__ . '/../database/seeders/' => base_path('database/seeders')], 'seeders');
    }

    /**
     * Publish Models File
     */
    private function publishModels()
    {
        $this->publishes([__DIR__ . '/../src/Models/' => base_path('app/models/World')], 'models');
    }

    private function registerCommands()
    {
        $this->commands([
            \Khsing\World\Console\InitCommand::class,
        ]);
    }
}
