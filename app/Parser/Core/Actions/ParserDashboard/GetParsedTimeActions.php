<?php


namespace App\Parser\Core\Actions\ParserDashboard;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\ParcingDurationRepository;

class GetParsedTimeActions extends Action
{

    public function __construct(ParcingDurationRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run() : array
    {
        return $this->repository->getTimeLastParsing()->toArray();
    }
}
