<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\MicrosoftStore\GetGamesIDAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\MicrosoftStore\ErrorGamesIDResponse;
use App\Parser\Core\Data\Responses\MicrosoftStore\GamesIDResponse;
use Illuminate\Http\Response;

class GetGamesIDController extends ApiController
{

    private bool $isParseAllIDs = false;

    public function __invoke()
    {
        try {
            $gamesID = \Action::call(GetGamesIDAction::class, $this->isParseAllIDs);
        } catch (\Exception $e) {
            return ErrorGamesIDResponse::init()
                ->message([
                    'title' => 'Error! Error at the stage of obtaining games ID.',
                    'body' => $e->getMessage()
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $message = 'Game ID data received.' .
            ($this->isParseAllIDs ? '' : ' Warning! Take only first 200 Ids.');

        return GamesIDResponse::init()
            ->data($gamesID)
            ->message([
                'title' => 'Parsing Games ID',
                'body' => $message,
            ])->response(Response::HTTP_OK);
    }
}
