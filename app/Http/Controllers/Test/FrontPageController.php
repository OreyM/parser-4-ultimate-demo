<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\__TODEL__Models\Employee;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
//        dd(trans('documents::types'));

        return view('welcome');
    }
}
