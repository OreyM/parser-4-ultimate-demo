<?php


namespace App\Parser\Core\Data\Objects;


use Carbon\Carbon;

class Price
{
    private ?bool $is_exist;
    private ?float  $rating;
    private ?float $selling_price;
    private ?float $old_price;
    private ?float $difference;
    private ?bool $discount;
    private ?bool $is_free;


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

        $this->selling_price = round($dirtyJsonData->DisplaySkuAvailabilities[0]
            ->Availabilities[0]->OrderManagementData->Price->ListPrice / $currency, 2);
        $this->old_price = round($dirtyJsonData->DisplaySkuAvailabilities[0]
            ->Availabilities[0]->OrderManagementData->Price->MSRP / $currency, 2);

        $this->discount = $this->selling_price < $this->old_price;
        $this->difference = $this->old_price - $this->selling_price;

        $this->isFree($dirtyJsonData->LocalizedProperties[0]->EligibilityProperties);

        return $this;
    }

    public function isFree(object $dialsStatus) : void
    {
        $this->is_free = ($this->selling_price === 0.0) && ($this->old_price  === 0.0);

        if (isset($dialsStatus->Affirmations)) {
            foreach ($dialsStatus->Affirmations as $status) {
                switch ($status->AffirmationId) {
                    case '9Z5SNB850ZPM': // gold
                        $this->is_free = true;
                        break;
                }
            }
        }
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }

}
