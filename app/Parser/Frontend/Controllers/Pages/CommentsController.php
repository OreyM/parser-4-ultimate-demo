<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class CommentsController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/comments');
    }
}
