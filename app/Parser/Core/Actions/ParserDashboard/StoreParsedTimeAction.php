<?php


namespace App\Parser\Core\Actions\ParserDashboard;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\ParcingDurationRepository;
use App\Parser\Core\Data\Requests\TotalParsedTimeRequest;
use App\Parser\Core\Models\ParcingDuration;

class StoreParsedTimeAction extends Action
{

    public function __construct(TotalParsedTimeRequest $request, ParcingDurationRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run() : ParcingDuration
    {
        $lastParsedTime = $this->repository->getTimeLastParsing();
        $currentTotalParsingTime = $this->request->finish;

        $data = [
            'total'      => $currentTotalParsingTime,
            'difference' => $currentTotalParsingTime - $lastParsedTime->total,
            'isBetter'   => ($currentTotalParsingTime - $lastParsedTime->total) < 0,
        ];

        return $this->repository->storeParsedTime($data);
    }
}
