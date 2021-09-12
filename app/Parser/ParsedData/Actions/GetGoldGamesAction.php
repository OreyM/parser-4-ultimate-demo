<?php


namespace App\Parser\ParsedData\Actions;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;

class __GetGoldGamesAction extends Action
{

    public function __construct(GamesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run()
    {
        $games = $this->repository->getGoldGamesPaginated([
            'id',
            'name',
            'slug',
            'img_prewie',
            'img_art',
            'img_with_title',
            'is_gold',
            'is_gold_free',
            'is_free',
            'discount',
            'selling_price',
            'difference',
        ], 15)->toJson();

        return json_decode($games);
    }
}
