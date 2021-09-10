<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\Games\StorePriceAction;
use App\Parser\Core\Actions\MicrosoftStore\GetArgentinaPriceAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Games\ErrorUpdatedOldGamesResponse;
use App\Parser\Core\Data\Responses\Games\UpdatedOldGamesResponse;
use Illuminate\Http\Response;

class UpdateOldGamesController extends ApiController
{
    public function __invoke()
    {
        try {
            $arGamesData = \Action::call(GetArgentinaPriceAction::class);
            \Action::call(StorePriceAction::class, $arGamesData);
        } catch (\Exception $e) {
            return ErrorUpdatedOldGamesResponse::init()
                ->message([
                    'title' => 'Error! Update old games',
                    'body'  => $e->getMessage(),
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return UpdatedOldGamesResponse::init()
            ->message([
                'title' => 'Update old games',
                'body'  => 'Price positions and status of all the old games updated.',
            ])->response(Response::HTTP_OK);
    }
}
