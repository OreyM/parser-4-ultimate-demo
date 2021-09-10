<?php


namespace App\Parser\Core\Actions\ParserDashboard;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;

class NoExistGameCountAction extends Action
{
    public function __construct(GamesRepository $repository)
    {

        $this->repository = $repository;
    }

    protected function run() : int
    {
        return $this->repository->getNoExistGamesCount();
    }
}
