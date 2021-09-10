<?php


namespace App\Core\Abstracts\Controllers;


use App\Parser\Core\Messages\AlertMessage;
use App\Parser\Core\Messages\ToastMessage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class ParserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected int $startTime;
    protected AlertMessage $alert;
    protected ToastMessage $toast;

    public function __construct()
    {
        $this->startTime = time();
        $this->alert = new AlertMessage();
        $this->toast = new ToastMessage();
    }
}
