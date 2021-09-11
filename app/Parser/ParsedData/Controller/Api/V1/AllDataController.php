<?php


namespace App\Parser\ParsedData\Controller\Api\V1;


use App\Parser\Core\Controllers\ApiController;
use App\Parser\ParsedData\Actions\GetAllDataAction;
use App\Parser\ParsedData\Data\Responses\AllDataResponse;
use App\Parser\ParsedData\Data\Responses\ErrorAllDataResponse;
use Illuminate\Http\Response;

class AllDataController extends ApiController
{
    public function __invoke()
    {
        try {
            $games = \Action::call(GetAllDataAction::class);
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
