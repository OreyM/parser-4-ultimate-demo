<?php


namespace App\Parser\Core\Providers;


use App\Core\Abstracts\Providers\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // config module
        $this->mergeConfigFrom(__DIR__.'/../Config/parser.php', 'parser');

        // routes
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/web.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/api.php');

        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Data/Migrations');

        // localisations
        $this->loadTranslationsFrom(__DIR__ . '/../UI/Langs', 'parser');
    }
}
