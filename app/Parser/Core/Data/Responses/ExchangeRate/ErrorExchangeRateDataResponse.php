<?php


namespace App\Parser\Core\Data\Responses\ExchangeRate;


use App\Core\Abstracts\Data\Responses\Response;

class ErrorExchangeRateDataResponse extends Response
{

    protected bool $error = true;

    public function message($message = null): Response
    {
        $this->message = $message;

        return $this;
    }
}
