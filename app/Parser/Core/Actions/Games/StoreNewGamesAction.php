<?php


namespace App\Parser\Core\Actions\Games;


use App\Core\Abstracts\Actions\Action;
use App\Parser\Core\Models\Games;
use App\Parser\Core\Services\ImageStorageService;
use Carbon\Carbon;

class StoreNewGamesAction extends Action
{

    private ImageStorageService $storage;

    public function __construct()
    {
        $this->storage = ImageStorageService::config('public/games/images');
    }

    protected function run()
    {
        $games = $this->external;

        foreach ($games as &$game) {
            $this->storage->addSubPath($game['name']);
            if (isset($game['img_prewie'])) {
                $game['img_prewie'] = $this->storage->saveWithName($game['name'], 'prewie')
                    ->save($game['img_prewie']);
            } else {$game['img_prewie'] = null;}
            if (isset($game['img_art'])) {
                $game['img_art'] = $this->storage->saveWithName($game['name'], 'art')
                    ->save($game['img_art']);
            } else {$game['img_art'] = null;}
            if (isset($game['img_with_title'])) {
                $game['img_with_title'] = $this->storage->saveWithName($game['name'], 'title')
                    ->save($game['img_with_title']);
            } else {$game['img_with_title'] = null;}

            $game['created_at'] = Carbon::now()->toDateTimeString();
            $game['updated_at'] = Carbon::now()->toDateTimeString();
        }

        Games::insert($games);
    }
}
