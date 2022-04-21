<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class usersController extends BaseController
{
    public function index()
    {
        $titel = "Home page";
        return view('home', compact('titel'));
    }

    public function about()
    {
        return view('about');
    }

}
