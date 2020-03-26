<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function gotoLogin()
    {
        return view('session.login');
    }
    
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        if(Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
//            session()->flash('success', 'Welcome Back');
            return redirect()->route('user.info', [Auth::user()]);
        } else {
//            session()->flash('danger', 'User not exists');
            return redirect()->back()->withInput();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
