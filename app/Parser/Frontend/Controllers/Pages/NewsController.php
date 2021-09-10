<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class NewsController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/news');
    }

    public function create()
    {
        return view('frontend::pages/playone/news/create');
    }
}
