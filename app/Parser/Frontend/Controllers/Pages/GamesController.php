<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class GamesController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/games');
    }
}
