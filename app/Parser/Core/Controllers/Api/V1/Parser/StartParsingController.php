<?php


namespace App\Parser\Core\Controllers\Api\V1\Parser;


use App\Parser\Core\Controllers\ApiController;
use App\Parser\Core\Data\Responses\Parser\StartParserResponse;
use Illuminate\Http\Response;

class StartParsingController extends ApiController
{

    public function __invoke()
    {
        return StartParserResponse::init()
            ->message([
                'title' => 'Parser Start!',
                'body'  => 'The process of parsing games from the Microsoft Store has begun.'
            ])->response(Response::HTTP_OK);
    }
}
