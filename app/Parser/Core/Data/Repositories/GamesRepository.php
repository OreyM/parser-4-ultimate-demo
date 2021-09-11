<?php


namespace App\Parser\Core\Data\Repositories;


use App\Core\Abstracts\Data\Repositories\Repository;
use App\Parser\Core\Models\Games;

class GamesRepository extends Repository
{
    /**
     * @var Games
     */
    protected $model = Games::class;

    public function getGamesTotalCount() : int
    {
        return $this->model->where('is_exist', true)->count();
    }

    public function getNewGamesCount() : int
    {
        return $this->model->where('is_new', true)->count();
    }

    public function getNoExistGamesCount() : int
    {
        return $this->model->where('is_exist', false)->count();
    }

    public function getAllSavedGamesIDArray() : array
    {
        return $this->model->select(['store_id'])
            ->pluck('store_id')
            ->toArray();
    }

    public function getMultipleGamesByOneColumnOnlyValue(array $gamesId) : array
    {
        return $this->model->select(['store_id'])
            ->whereIn('store_id', $gamesId)
            ->pluck('store_id')
            ->toArray();
    }

    public function updateGlobal(array $properties = ['*'])
    {
        return $this->model->select(['*'])->update($properties);
    }

    public function updatePrices(string $storeId, array $prices)
    {
        $this->model->where('store_id', $storeId)->update($prices);
    }

    public function getGamesDataWithoutExistPaginated(array $columns, int $paginate)
    {
        return $this->model->select($columns)->where('is_exist', true)->paginate($paginate);
    }
}
