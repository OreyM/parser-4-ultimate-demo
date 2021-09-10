<?php


namespace App\Parser\Core\Actions\MicrosoftStore;


use App\Core\Abstracts\Actions\Action;
use App\Core\Services\CurlService;
use App\Parser\Core\Data\Objects\Price;
use App\Parser\Core\Data\Requests\PriceRequest;

class GetArgentinaPriceAction extends Action
{

    private CurlService $curl;
    private array $games;

    public function __construct(PriceRequest $request)
    {
        $this->request = $request;
        $this->curl = new CurlService();
        $this->games = [];
    }

    protected function run() : array
    {
        $gamesId = $this->request->gamesId;
        $currency = $this->request->currency;

        $links = config('parser.parser_game_link');
        $region = config('parser.regions.ar.games');

        $url = $links['startLink'] . implode(',', $gamesId) . $region . $links['finishLink'];

        $gamesData = json_decode($this->curl->pars($url)->get())->Products;

        foreach ($gamesData as $dirtyJsonGame) {
            $this->games[$dirtyJsonGame->ProductId] = Price::init()
                ->set($dirtyJsonGame, $currency)->toArray();
        }

        return $this->games;
    }
}
