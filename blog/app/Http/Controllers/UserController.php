<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
//        return 'login';
        return view('static_pages/login');
    }
    
    public function signup()
    {
        
    }
    
    public function logout()
    {
//        return 'logout';
        return view('static_pages/logout');
    }
}
