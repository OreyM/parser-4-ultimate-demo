<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;
use App\Parser\Core\Models\Games;

class ParserController extends FrontendController
{
    public function newParsing()
    {
        return view('frontend::pages/parser/new-parsing');
    }

    public function parsedData()
    {
        return view('frontend::pages/parser/parsed-data');
    }
}
