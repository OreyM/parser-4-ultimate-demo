<?php


namespace App\Parser\Core\Data\Objects;


class Price
{
    private ?bool $is_exist;
    private ?float  $rating;
    private ?float $selling_price;
    private ?float $old_price;
    private ?float $difference;
    private ?bool $discount;
    private ?bool $is_free;

    private bool $is_gold = false;
    private bool $is_gold_free = false;
    private bool $is_game_pass = false;
    private bool $is_ea = false;


    private function __construct()
    {
        $this->is_exist = true;
    }

    public static function init() : Price
    {
        return new self();
    }

    public function set(object $dirtyJsonData, float $currency) : Price
    {
        $this->rating = $dirtyJsonData->MarketProperties[0]->UsageData[2]->AverageRating;

        $this->checkGameDialStatus($dirtyJsonData->LocalizedProperties[0]->EligibilityProperties);
        $this->checkPrice($dirtyJsonData, $currency);

        $this->discount = $this->selling_price < $this->old_price;
        $this->difference = $this->old_price - $this->selling_price;

        $this->is_free = (($this->selling_price === 0.0) && ($this->old_price  === 0.0));

        return $this;
    }

    private function checkGameDialStatus(object $dialsStatus) : void
    {
        if (isset($dialsStatus->Affirmations)) {
            foreach ($dialsStatus->Affirmations as $status) {
                switch ($status->AffirmationId) {
                    case '9RVBF5P99P15':
                        $this->is_gold = true;
                        break;
                    case '9WNZS2ZC9L74':
                        $this->is_game_pass = true;
                        break;
                    case '9Z5SNB850ZPM':
                        $this->is_gold_free = true;
                        $this->is_free = true;
                        break;
                    case 'B0HFJ7PW900M':
                        $this->is_ea = true;
                        break;
                }
            }
        }
    }

    private function checkPrice(object $dirtyJsonData , float $currency) : void
    {
        if ($this->is_gold) {
            $price = $dirtyJsonData->DisplaySkuAvailabilities[0]->Availabilities[1];
        } else {
            $price = $dirtyJsonData->DisplaySkuAvailabilities[0]->Availabilities[0];
        }

        $this->selling_price = round($price->OrderManagementData->Price->ListPrice / $currency, 2);
        $this->old_price = round($price->OrderManagementData->Price->MSRP / $currency, 2);
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }

}
