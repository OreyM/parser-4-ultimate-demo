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
        $games = Games::select([
            'id',
            'name',
            'slug',
            'img_prewie',
            'img_art',
            'img_with_title',
            'is_gold',
            'is_gold_free',
            'is_game_pass',
            'is_ea',
            'is_free',
            'discount',
            'selling_price',
            'difference',
        ])->where('is_exist', true)->paginate(15);


//        dd($games);

//        return json_decode($games->toJson());

        return view('frontend::pages/parser/parsed-data', compact('games'));
    }
}
