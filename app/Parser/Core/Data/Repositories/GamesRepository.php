<?php


namespace App\Parser\Core\Data\Repositories;


use App\Core\Abstracts\Data\Repositories\Repository;
use App\Parser\Core\Models\Games;
use Carbon\Carbon;

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

    public function getGames(
        int $paginate,
        array $type,
        array $image,
        string $order,
        string $direct,
        string $search,
        bool $remote
    )
    {
        if ($remote) {
            $q = $this->model->where('is_exist', false);
        } else {
            $q = $this->model->where('is_exist', true);
        }

        if ( ! empty($image)) {
            $q->whereNull($image[0]);
            $q->OrWhereNull($image[1]);
        }

        if ( ! empty($type)) {
            $q->where([$type]);
        }

        if ( ! empty($search)) {
            $q->where('name', 'LIKE', '%' . $search . '%');
        }

        $result =  $q->orderBy($order, $direct)
            ->paginate($paginate);

        $result->getCollection()->each(function (Games $game) {
            return $game->created = Carbon::parse($game->created_at)->format('d.m.Y');
        });

        return $result->toJson();
    }

    public function withImagesProblem()
    {
        return $this->model->whereNull('img_prewie')
            ->where('is_exist', true)
            ->OrWhereNull('img_art')
            ->count();
    }

    public function getGamesDataWithoutExistPaginated(array $columns, int $paginate)
    {
        return $this->model->select($columns)
            ->where('is_exist', true)
            ->orderBy('name')
            ->paginate($paginate);
    }

    public function getGoldGamesPaginated(array $columns, int $paginate)
    {
        return $this->model->select($columns)->where([
            ['is_exist', '=', true],
            ['is_gold', '=', true],
        ])
            ->orderBy('name')
            ->paginate($paginate);
    }

    public function getGamePassGamesPaginated(array $columns, int $paginate)
    {
        return $this->model->select($columns)->where([
            ['is_exist', '=', true],
            ['is_game_pass', '=', true],
        ])
            ->orderBy('name')
            ->paginate($paginate);
    }
}
