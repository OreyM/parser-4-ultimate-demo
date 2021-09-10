<?php


namespace App\Parser\Frontend\Actions;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Objects\ParserTimeObject;
use App\Parser\Core\Data\Repositories\ParcingDurationRepository;
use App\Parser\Core\Models\ParcingDuration;

class GetLastTimeParcingAction extends Action
{

    private ParserTimeObject $result;

    public function __construct(ParcingDurationRepository $repository)
    {
        $this->repository = $repository;
        $this->result = new ParserTimeObject();
    }

    protected function run()
    {
        $data = $this->repository->getTimeLastParsing();

        $this->result->total = $data->total;
        $this->result->difference = $data->difference;
        $this->result->isBetter = $data->isBetter;

        return $this->result;
    }
}
