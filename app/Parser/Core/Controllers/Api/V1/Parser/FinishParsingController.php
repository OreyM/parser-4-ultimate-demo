<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Actions\ParserDashboard\LastParsingDateAction;
use App\Parser\Core\Actions\ParserDashboard\NewGamesCountAction;
use App\Parser\Core\Actions\ParserDashboard\NoExistGameCountAction;
use App\Parser\Core\Actions\ParserDashboard\StoreParsedTimeAction;
use App\Parser\Core\Actions\ParserDashboard\TotalGamesCountAction;
use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Parser\ErrorFinishParserResponse;
use App\Parser\Core\Data\Responses\Parser\FinishParserResponse;
use Illuminate\Http\Response;

class FinishParsingController extends ApiController
{

    public function __invoke()
    {
        sleep(2); // TODO test data. Put away!

        try {
            $parsedTime         = \Action::call(StoreParsedTimeAction::class);
            $totalGamesCount    = \Action::call(TotalGamesCountAction::class);
            $newGamesCount      = \Action::call(NewGamesCountAction::class);
            $noExistGameCount   = \Action::call(NoExistGameCountAction::class);
            $lastParsingTime    = \Action::call(LastParsingDateAction::class);
        } catch (\Exception $e) {
            return ErrorFinishParserResponse::init()
                ->message([
                    'title' => 'An error at the end of parsing!',
                    'body' => $e->getMessage(),
                ])->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return FinishParserResponse::init()
            ->message([
                'title' => 'Parsing is done!',
                'body'  => 'Parsing games from the Microsoft Store is now complete! Have a nice day!'
            ])->data([
                'stretchCards' => [
                    'parsedTime'        => $parsedTime,
                    'totalGamesCount'   => $totalGamesCount,
                    'newGamesCount'     => $newGamesCount,
                    'noExistGameCount'  => $noExistGameCount,
                ],
                'lastParsingTime'   => $lastParsingTime,
            ])->response(Response::HTTP_OK);
    }
}
