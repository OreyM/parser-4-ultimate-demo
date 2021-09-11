<?php


namespace App\Parser\ParsedData\Providers;


use App\Core\Abstracts\Providers\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // config module
        $this->mergeConfigFrom(__DIR__.'/../Config/parser-data.php', 'parser-data');

        // routes
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/web.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/api.php');

        // localisations
        $this->loadTranslationsFrom(__DIR__ . '/../UI/Langs', 'parser');
    }
}
