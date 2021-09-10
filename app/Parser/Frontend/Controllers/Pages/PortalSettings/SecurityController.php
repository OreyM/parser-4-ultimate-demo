<?php


namespace App\Parser\Frontend\Controllers\Pages\PortalSettings;


use App\Core\Abstracts\Controllers\FrontendController;

class SecurityController extends FrontendController
{
    public function index()
    {
        return view('frontend::pages/playone/settings/security');
    }
}
