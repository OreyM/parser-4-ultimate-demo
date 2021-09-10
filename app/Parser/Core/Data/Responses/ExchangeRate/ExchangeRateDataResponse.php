<?php


namespace App\Parser\Core\Data\Responses\ExchangeRate;


use App\Core\Abstracts\Data\Responses\Response;

class ExchangeRateDataResponse extends Response
{

    public function message($message = null): Response
    {
        $this->message = 'Data on the current exchange rate was received successfully.';

        return $this;
    }
}
