<?php


namespace App\Parser\Frontend\Providers;


use App\Core\Abstracts\Providers\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // config module
        $this->mergeConfigFrom(__DIR__.'/../Config/frontend.php', 'frontend');

        // routes
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/dashboard.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/comments.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/games.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/parser.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/portal.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/portal-settings.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/posts.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/seo.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/statistics.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/users.php');
        $this->loadRoutesFrom( __DIR__ . '/../UI/Routes/web.php');

        // views
        $this->loadViewsFrom(__DIR__.'/../UI/Views', 'frontend');

        // localisations
        $this->loadTranslationsFrom(__DIR__ . '/../UI/Langs', 'frontend');
    }
}
