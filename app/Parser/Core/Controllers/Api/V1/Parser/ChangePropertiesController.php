<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\Games\ChangeGamesTablePropertiesAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Games\ErrorGamesTableResponse;
use App\Parser\Core\Data\Responses\Games\GamesTableResponse;
use Illuminate\Http\Response;

class ChangePropertiesController extends ApiController
{

    public function __invoke()
    {
        try {
            \Action::call(ChangeGamesTablePropertiesAction::class);
        } catch (\Exception $e) {
            return ErrorGamesTableResponse::init()
                ->message([
                    'title' => 'Error! Updating properties in the Games table',
                    'body'  => $e->getMessage(),
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return GamesTableResponse::init()
            ->message([
                'title' => 'Updating properties in the Games table',
                'body'  => 'Games table properties \'is_new\' & \'is_exist\' updated.',
            ])->response(Response::HTTP_OK);
    }
}

