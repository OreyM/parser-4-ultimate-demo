<?php


namespace App\Parser\ParsedData\Actions;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Data\Repositories\GamesRepository;
use App\Parser\ParsedData\Data\Requests\DataRequest;

class GetGamesDataAction extends Action
{

    public function __construct(DataRequest $request, GamesRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run()
    {
//        dd($this->request->all());
//        dd($this->request->type);

        $order = $this->request->order ?: 'name';
        $direct = $this->request->direct ?: 'ASC';
        $search = $this->request->search ?: '';
        $remote = false;

        switch ($this->request->type) {
            case 'image':
                $type = [
                    ['img_prewie', '=', null],
                    ['img_art', '=', null],
                    ['img_with_title', '=', null],
                ];
                break;
            case 'discount':
                $type = ['discount', '=', true];
                break;
            case 'gold':
                $type = ['is_gold', '=', true];
                break;
            case 'gold-free':
                $type = ['is_gold_free', '=', true];
                break;
            case 'game-pass':
                $type = ['is_game_pass', '=', true];
                break;
            case 'ea':
                $type = ['is_ea', '=', true];
                break;
            case 'free':
                $type = ['is_free', '=', true];
                break;
            case 'remote':
                $remote = true;
            default:
                $type = [];
        }

        $data = $this->repository->getGames(15, $type, $order, $direct, $search, $remote);

        return json_decode($data);
    }
}
