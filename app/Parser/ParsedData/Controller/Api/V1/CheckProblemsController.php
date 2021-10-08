<?php


namespace App\Parser\ParsedData\Controller\Api\V1;


use App\Parser\Core\Controllers\ApiController;
use App\Parser\ParsedData\Actions\CheckImagesProblemAction;
use App\Parser\ParsedData\Data\Responses\HaveProblemResponse;
use App\Parser\ParsedData\Data\Responses\NoProblemResponse;
use Illuminate\Http\Response;

class CheckProblemsController extends ApiController
{
    public function __invoke()
    {
        if ($count = \Action::call(CheckImagesProblemAction::class)) {
            return HaveProblemResponse::init()
                ->message('Found problems with reference to the game images. Fix it.')
                ->data([
                    'count' => $count
                ])
                ->response(Response::HTTP_OK);
        }

        return NoProblemResponse::init()
            ->message('No problem!')
            ->data([
                'count' => $count
            ])
            ->response(Response::HTTP_OK);
    }
}
