<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\Games\GetSavedGamesIDAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Games\ErrorSavedGamesIDResponse;
use App\Parser\Core\Data\Responses\Games\SavedGamesIDResponse;
use Illuminate\Http\Response;

class GetSavedGamesIDController extends ApiController
{
    public function __invoke()
    {
        try {
            $savedGamesID = \Action::call(GetSavedGamesIDAction::class);
        } catch (\Exception $e) {
            return ErrorSavedGamesIDResponse::init()
                ->message([
                    'title' => 'Error! Get saved games ID',
                    'body'  => 'An error occurred while retrieving the game IDs stored in the database. `ApiController::GetSavedGamesIDController`.',
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return SavedGamesIDResponse::init()
            ->message([
                'title' => 'Get saved games ID',
                'body'  => 'Received games ID stored in the database. Arrays of new and old games have been formed.',
            ])->data($savedGamesID)
            ->response(Response::HTTP_OK);
    }
}
