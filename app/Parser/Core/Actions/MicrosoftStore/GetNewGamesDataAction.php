<?php


namespace App\Parser\Core\Actions\MicrosoftStore;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Objects\Game;
use App\Parser\Core\Data\Requests\NewGamesIDRequest;
use App\Core\Services\CurlService;


class GetNewGamesDataAction extends Action
{

    private CurlService $curl;
    private array $games;

    public function __construct(NewGamesIDRequest $request)
    {
        $this->request = $request;
        $this->curl = new CurlService();
        $this->games = [];
    }

    protected function run()
    {
        $gamesId = $this->request->gamesId;
        // TODO I'm just too lazy to do Object =) Make it ok. Then =)
        $links = config('parser.parser_game_link');
        $region = config('parser.regions.ru.games');

        $url = $links['startLink'] . implode(',', $gamesId) . $region . $links['finishLink'];

        $gamesData = json_decode($this->curl->pars($url)->get())->Products;

        foreach ($gamesData as $dirtyJsonGame) {
            $this->games[] = Game::init()->set($dirtyJsonGame)->toArray();
        }

        return $this->games;
    }
}
