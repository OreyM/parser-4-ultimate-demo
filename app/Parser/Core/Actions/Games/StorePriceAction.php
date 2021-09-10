<?php


namespace App\Parser\Core\Actions\Games;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;

class StorePriceAction extends Action
{

    public function __construct(GamesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        foreach ($this->external as $gameId => $game) {
            $this->repository->updatePrices($gameId, $game);
        }
    }
}
