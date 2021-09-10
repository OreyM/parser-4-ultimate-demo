<?php


namespace App\Parser\Frontend\Controllers\Pages\Portal;


use App\Core\Abstracts\Controllers\FrontendController;

class FrontPageController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/portal/front-page');
    }
}
