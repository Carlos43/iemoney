<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller
{
    public function home()
    {
//        return 'home';
        return view('static_pages/home');
    }
}
