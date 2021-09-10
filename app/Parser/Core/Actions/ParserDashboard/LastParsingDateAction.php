<?php


namespace App\Parser\Core\Actions\ParserDashboard;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\ParcingDurationRepository;
use Carbon\Carbon;

class LastParsingDateAction extends Action
{

    public function __construct(ParcingDurationRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run() : Carbon
    {
        $date = $this->repository->getDateLastParsing();

        return Carbon::parse($date->created_at);
    }
}
