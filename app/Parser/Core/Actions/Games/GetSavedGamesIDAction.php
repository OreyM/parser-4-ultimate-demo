<?php


namespace App\Parser\Core\Actions\Games;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Objects\SavedGames;
use App\Parser\Core\Data\Repositories\GamesRepository;

class GetSavedGamesIDAction extends Action
{

    public function __construct(GamesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->getAllSavedGamesIDArray();
    }
}
