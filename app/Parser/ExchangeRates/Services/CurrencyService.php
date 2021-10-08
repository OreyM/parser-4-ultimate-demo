<?php


namespace App\Parser\ExchangeRates\Services;

use App\Core\Exceptions\ExternalApiException;
use App\Parser\ExchangeRates\Data\Objects\RatesObject;
use App\Core\Services\CurlService;

class CurrencyService
{

    /**
     * @var null|objects
     */
    private $currencies;

    private CurlService $curl;
    private ?string $url;

    public function __construct()
    {
        $this->url = null;
        $this->currencies = null;
        $this->curl = new CurlService();
    }

    public static function init() : CurrencyService
    {
        return new self();
    }

    public function setUrl(string $url) : CurrencyService
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return RatesObject
     * @throws App\Core\Exceptions\ExternalApiException
     */
    public function pars() : RatesObject
    {
        if ($this->url) {
            return $this->curl->getContent($this->url)->toJsone();
        }

        $url = implode('', config('exchange_rates_api.service'));

        $result = $this->curl->pars($url);

        $this->currencies = json_decode($result->get());

        if (isset($this->currencies->error)) {
            throw new ExternalApiException(
                $this->currencies->status,
                "[{$this->currencies->message}] {$this->currencies->description}"
            );
        }

        return new RatesObject($this->currencies->rates);
    }
}
