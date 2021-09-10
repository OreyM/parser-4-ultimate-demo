<?php


namespace App\Parser\Frontend\Controllers\Pages;


use App\Core\Abstracts\Controllers\FrontendController;

class UsersController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/users');
    }

    public function create()
    {
        return view('frontend::pages/playone/users/create');
    }

    public function banned()
    {
        return view('frontend::pages/playone/users/banned');
    }
}
