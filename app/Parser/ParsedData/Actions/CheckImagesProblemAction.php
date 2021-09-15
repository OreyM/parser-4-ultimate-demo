<?php


namespace App\Parser\ParsedData\Actions;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;

class CheckImagesProblemAction extends Action
{

    public function __construct(GamesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        return $this->repository->withImagesProblem();
    }
}
