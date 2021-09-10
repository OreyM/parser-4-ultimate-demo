<?php


namespace App\Parser\Core\Actions\ParserDashboard;


use App\Core\Abstracts\Actions\Action;
use App\Parser\ExchangeRates\Services\CurrencyService;

class GetCurrentExchangeRateAction extends Action
{

    private CurrencyService $service;

    public function __construct(CurrencyService $service)
    {
        $this->service = $service;
    }

    protected function run()
    {
        return $this->service::init()->pars();
    }
}
