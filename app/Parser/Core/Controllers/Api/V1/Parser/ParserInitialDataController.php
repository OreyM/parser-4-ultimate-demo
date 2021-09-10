<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Core\Exceptions\ExternalApiException;
use App\Parser\Core\Actions\ParserDashboard\GetCurrentExchangeRateAction;
use App\Parser\Core\Actions\ParserDashboard\LastParsingDateAction;
use App\Parser\Core\Actions\ParserDashboard\NewGamesCountAction;
use App\Parser\Core\Actions\ParserDashboard\NoExistGameCountAction;
use App\Parser\Core\Actions\ParserDashboard\GetParsedTimeActions;
use App\Parser\Core\Actions\ParserDashboard\TotalGamesCountAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\ExchangeRate\ErrorExchangeRateDataResponse;
use App\Parser\Core\Data\Responses\Parser\ErrorStartParserResponse;
use App\Parser\Core\Data\Responses\Parser\StartParserResponse;
use Illuminate\Http\Response;

class ParserInitialDataController extends ApiController
{

    public function __invoke()
    {
        try {
            $parsedTime      = \Action::call(GetParsedTimeActions::class);
            $totalGamesCount = \Action::call(TotalGamesCountAction::class);
            $newGamesCount   = \Action::call(NewGamesCountAction::class);
            $noExistGameCount = \Action::call(NoExistGameCountAction::class);
            $lastParsingTime = \Action::call(LastParsingDateAction::class);
        } catch (\Exception $e) {
            return ErrorStartParserResponse::init()
                ->message([
                    'title' => 'Parser initialization error!',
                    'body' => $e->getMessage()
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $currentExchangeRate = \Action::call(GetCurrentExchangeRateAction::class);
        } catch (ExternalApiException $e) {
            return ErrorExchangeRateDataResponse::init()
                ->message($e->getMessage())
                ->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

//        dd($currentExchangeRate->rates->ARS);

        return StartParserResponse::init()
            ->message('Parser initialized. All ok! You can start parsing.')
            ->data([
                'stretchCards' => [
                    'parsedTime'        => $parsedTime,
                    'totalGamesCount'   => $totalGamesCount,
                    'newGamesCount'     => $newGamesCount,
                    'noExistGameCount'  => $noExistGameCount,
                ],
                'lastParsingTime'       => $lastParsingTime,
                'currentExchangeRate'   => $currentExchangeRate,
            ])->response(Response::HTTP_OK);
    }
}
