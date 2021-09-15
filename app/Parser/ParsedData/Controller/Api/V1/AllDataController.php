<?php


namespace App\Parser\ParsedData\Controller\Api\V1;


use App\Parser\Core\Controllers\ApiController;
use App\Parser\ParsedData\Actions\GetAllDataAction;
use App\Parser\ParsedData\Actions\GetGamePassDataAction;
use App\Parser\ParsedData\Actions\GetGamesDataAction;
use App\Parser\ParsedData\Actions\GetGoldGamesAction;
use App\Parser\ParsedData\Data\Responses\AllDataResponse;
use App\Parser\ParsedData\Data\Responses\ErrorAllDataResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AllDataController extends ApiController
{

    public function __invoke(Request $request)
    {
//        sleep(1); // TODO for test

        try {
            // http://127.0.0.1:8000/data/api/v1/all?page=1&type=&order=&direct=&search=
            $games = \Action::call(GetGamesDataAction::class);

        } catch (\Exception $e) {
            return ErrorAllDataResponse::init()
                ->message([
                    'title' => 'Error getting parsed data.'
                ])->data($e)
                ->response(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return AllDataResponse::init()->data($games)->response(Response::HTTP_OK);
    }
}
