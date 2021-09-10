<?php


namespace App\Parser\Core\Data\Objects;


use Carbon\Carbon;

class Game
{
    private ?string $store_id;
    private ?string $name;
    private bool    $is_new;
    private ?string $category;
    private ?string $slug;
    private ?string $publisher;
    private ?string $img_prewie;
    private ?string $img_art;
    private ?string $img_with_title;
    private ?string $description;
    private ?string $release_date;
    private ?int    $min_user_age;
    private ?bool   $x360_support;
    private ?bool   $xseries_support;
    private ?string $game_capabilities; // JSON
    private ?bool   $ru_local;
    private ?string $all_local; // JSON
    private ?float  $rating;

    private bool $is_gold = false;
    private bool $is_gold_free = false;
    private bool $is_game_pass = false;
    private bool $is_ea = false;

    private function __construct()
    {
        $this->is_new = true;
    }

    public static function init() : Game
    {
        return new self();
    }

    public function set(object $dirtyJsonData) : Game
    {
        $this->store_id = $dirtyJsonData->ProductId;
        $this->name = $this->clearTitle($dirtyJsonData->LocalizedProperties[0]->ProductTitle);
        $this->category = $dirtyJsonData->Properties->Category;
        $this->slug = \Str::slug($this->name);
        $this->publisher = $dirtyJsonData->LocalizedProperties[0]->PublisherName;
        $this->images($dirtyJsonData->LocalizedProperties[0]->Images);
        $this->description = $this->description($dirtyJsonData->LocalizedProperties[0]->ProductDescription);
        $this->checkGameDialStatus($dirtyJsonData->LocalizedProperties[0]->EligibilityProperties);
        $this->release_date = $this->releaseDate($dirtyJsonData->MarketProperties[0]->OriginalReleaseDate);
        $this->min_user_age = $dirtyJsonData->MarketProperties[0]->MinimumUserAge;
        $this->x360_support = $this->isX360support($dirtyJsonData->Properties->PackageFamilyName);
        $this->game_capabilities = json_encode($this->checkGameCapabilities($dirtyJsonData->Properties->Attributes));
        $this->all_local = $this->getAllLoacal(
            $dirtyJsonData->DisplaySkuAvailabilities[0]->Sku->MarketProperties[0]->SupportedLanguages);
        $this->ru_local = $this->checkRULocal(
            $dirtyJsonData->DisplaySkuAvailabilities[0]->Sku->MarketProperties[0]->SupportedLanguages);
        $this->rating = $dirtyJsonData->MarketProperties[0]->UsageData[2]->AverageRating;

        if (isset($dirtyJsonData->Properties->XboxConsoleGenCompatible)) {
            $this->xseries_support = $this->isSeriesSupport($dirtyJsonData->Properties->XboxConsoleGenCompatible);
        } else {
            $this->xseries_support = false;
        }

        return $this;
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }

    private function clearTitle(string $title) : string
    {
        return str_replace(['®', '™'], '', $title);
    }

    private function releaseDate(string $date) : string
    {
        return Carbon::parse($date)->toDateTimeString();
    }

    private function images(array $images) : void
    {
        foreach ($images as $image) {
            switch ($image->ImagePurpose) {
                case('BrandedKeyArt'): // Poster
                    $this->img_prewie = ltrim($image->Uri, '//');
                    break;
                case('SuperHeroArt'):
                    $this->img_art = ltrim($image->Uri, '//');
                    break;
                case('TitledHeroArt'):
                    $this->img_with_title = ltrim($image->Uri, '//');
                    break;
            }
        }
    }

    private function description(string $sourceDescription) : string
    {
        return nl2br($sourceDescription);
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
                        break;
                    case 'B0HFJ7PW900M':
                        $this->is_ea = true;
                        break;
                }
            }
        }
    }

    private function isX360support(?string $support) : bool
    {
        return !is_null($support) &&
            !empty($support) &&
            (false !== strpos($support, 'Xbox360Backward'));
    }

    private function isSeriesSupport($deviceList) : bool
    {
        if (is_array($deviceList)) {
            foreach ($deviceList as $device) {
                if ($device === 'ConsoleGen9') return true;
            }
        }

        return false;
    }

    private function checkGameCapabilities(?array $attributes)
    {
        $properties = [];

        if (is_null($attributes)) {
            return $properties;
        }

        foreach ($attributes as $attribute) {
            switch ($attribute->Name) {
                case 'XblOnlineMultiPlayer':
                    $properties[$attribute->Name] = [
                        'type'   => 'online_multiplayer',
                        'status' => true,
                        'min'    => $attribute->Minimum,
                        'max'    => $attribute->Maximum,
                    ];
                    break;
                case 'XblOnlineCoop':
                    $properties[$attribute->Name] = [
                        'type'   => 'online_coop',
                        'status' => true,
                        'min'    => $attribute->Minimum,
                        'max'    => $attribute->Maximum,
                    ];
                    break;
                case 'XblLocalMultiPlayer':
                    $properties[$attribute->Name] = [
                        'type'   => 'local_multiplayer',
                        'status' => true,
                        'min'    => $attribute->Minimum,
                        'max'    => $attribute->Maximum,
                    ];
                    break;
                case 'SharedSplitScreen':
                    if ($attribute->ApplicablePlatforms) {
                        $properties[$attribute->Name] = [
                            'type'   => 'splitscreen',
                            'status' => true,
                        ];
                    }
                    break;
                case 'XblLocalCoop':
                    $properties[$attribute->Name] = [
                        'type'   => 'local_coop',
                        'status' => true,
                        'min'    => $attribute->Minimum,
                        'max'    => $attribute->Maximum,
                    ];
                    break;
                case 'Capability4k':
                    if ($attribute->ApplicablePlatforms) {
                        $properties[$attribute->Name] = [
                            'type'   => 'support_4k',
                            'status' => true,
                        ];
                    }
                    break;
                case 'CapabilityHDR':
                    if ($attribute->ApplicablePlatforms) {
                        $properties[$attribute->Name] = [
                            'type'   => 'support_hdr',
                            'status' => true,
                        ];
                    }
                    break;
                case 'XblCrossPlatformCoop':
                    if ($attribute->ApplicablePlatforms) {
                        if ($attribute->ApplicablePlatforms) {
                            $properties[$attribute->Name] = [
                                'type'    => 'cross_platform',
                                'status'  => true,
                                'devices' => $attribute->ApplicablePlatforms,
                            ];
                        }
                    }
                    break;
                case 'RayTracing':
                    if ($attribute->ApplicablePlatforms) {
                        if ($attribute->ApplicablePlatforms) {
                            $properties[$attribute->Name] = [
                                'type'    => 'ray_tracing',
                                'status'  => true,
                            ];
                        }
                    }
                    break;
                case '60fps':
                    if ($attribute->ApplicablePlatforms) {
                        if ($attribute->ApplicablePlatforms) {
                            $properties['support' . $attribute->Name] = [
                                'type'    => 'support_60fps',
                                'status'  => true,
                            ];
                        }
                    }
                    break;
                case '120fps':
                    if ($attribute->ApplicablePlatforms) {
                        if ($attribute->ApplicablePlatforms) {
                            $properties['support' . $attribute->Name] = [
                                'type'    => 'support_120fps',
                                'status'  => true,
                            ];
                        }
                    }
                    break;
            }
        }

        return $properties;
    }

    private function getAllLoacal(array $languageList) : string
    {
        return json_encode($languageList);
    }

    private function checkRULocal(array $languageList) : bool
    {
        return in_array('ru', $languageList, true) || in_array('ru-ru', $languageList, true);
    }
}
