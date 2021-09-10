<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class MainPageController extends FrontendController
{
    public function __invoke()
    {
        return view('frontend::pages/parser/main');
    }
}
