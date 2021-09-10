<?php


namespace App\Parser\ExchangeRates\Providers;


use App\Core\Abstracts\Providers\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // config module
        $this->mergeConfigFrom(__DIR__.'/../Config/exchange_rates_api.php', 'exchange_rates_api');
    }
}
