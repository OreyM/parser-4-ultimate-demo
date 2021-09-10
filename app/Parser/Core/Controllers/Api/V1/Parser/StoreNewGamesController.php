<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\Games\StoreNewGamesAction;
use App\Parser\Core\Actions\Games\StorePriceAction;
use App\Parser\Core\Actions\MicrosoftStore\GetArgentinaPriceAction;
use App\Parser\Core\Actions\MicrosoftStore\GetNewGamesDataAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Games\ErrorSavedNewGamesResponse;
use App\Parser\Core\Data\Responses\Games\SavedNewGamesResponse;
use Illuminate\Http\Response;

class StoreNewGamesController extends ApiController
{
    public function __invoke()
    {
        try {
            $gamesData = \Action::call(GetNewGamesDataAction::class);
            \Action::call(StoreNewGamesAction::class, $gamesData);
            $arGamesData = \Action::call(GetArgentinaPriceAction::class);
            \Action::call(StorePriceAction::class, $arGamesData);
        } catch (\Exception $e) {
            return ErrorSavedNewGamesResponse::init()
                ->message([
                    'title' => 'Error! Store new games',
                    'body'  => $e->getMessage(),
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return SavedNewGamesResponse::init()
            ->message([
                'title' => 'Store new games',
                'body'  => 'Store the new games, their prices and images for them.',
            ])->response(Response::HTTP_OK);
    }
}
