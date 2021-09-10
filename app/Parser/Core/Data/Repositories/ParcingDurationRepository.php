<?php


namespace App\Parser\Core\Data\Repositories;


use App\Core\Abstracts\Data\Repositories\Repository;
use App\Parser\Core\Models\ParcingDuration;

class ParcingDurationRepository extends Repository
{
    /**
     * @var ParcingDuration
     */
    protected $model = ParcingDuration::class;

    public function getTimeLastParsing()
    {
        return $this->model->select(['total', 'difference', 'isBetter'])->get()->last();
    }

    public function getDateLastParsing()
    {
        return $this->model->select(['created_at'])->get()->last();
    }

    public function getLastTotalTime() : string
    {
        return $this->model->select(['total'])->get()->last()->total;
    }

    public function storeParsedTime(array $data)
    {
        return $this->model->create($data);
    }
}
