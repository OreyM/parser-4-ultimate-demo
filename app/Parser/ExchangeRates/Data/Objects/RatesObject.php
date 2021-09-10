<?php


namespace App\Parser\ExchangeRates\Data\Objects;


class RatesObject
{
    /**
     * @var object
     */
    public $rates;

    /**
     * RatesObject constructor.
     * @param object $rates (JSON)
     */
    public function __construct($rates)
    {
        $this->rates = $rates;
    }

    /**
     * @return object
     */
    public function getAllRates()
    {
        return $this->rates;
    }

    public function getArgentinaRate() : float
    {
        return $this->rates->ARS;
    }

    public function getEuroRate() : float
    {
        return $this->rates->EUR;
    }

    public function getGBRate() : float
    {
        return $this->rates->GBP;
    }

    public function turkeyRate() : float
    {
        return $this->rates->TRY;
    }

    public function indiaRate() : float
    {
        return $this->rates->INR;
    }

    public function southAfricaRate() : float
    {
        return $this->rates->ZAR;
    }

    public function columbiaRate() : float
    {
        return $this->rates->COP;
    }
}
