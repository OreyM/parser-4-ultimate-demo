<?php


namespace App\Parser\Core\Actions\Games;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;
use App\Parser\Core\Exceptions\Games\GamesTableErrorExeption;

class ChangeGamesTablePropertiesAction extends Action
{

    public function __construct(GamesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        $result = $this->repository->updateGlobal([
            'is_new'    => false,
            'is_exist'  => false,
        ]);

//        if ( ! $result) {
//            throw new GamesTableErrorExeption(422, 'An error occurred while updating the properties of the Games table. Check ChangeGamesTablePropertiesAction');
//        }
    }
}
