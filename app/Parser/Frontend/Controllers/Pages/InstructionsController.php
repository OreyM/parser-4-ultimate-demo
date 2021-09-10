<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class InstructionsController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/instructions');
    }

    public function create()
    {
        return view('frontend::pages/playone/instructions/create');
    }
}
