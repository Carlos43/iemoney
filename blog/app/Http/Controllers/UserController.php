<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    public function gotoSignUp()
    {
        return view('userPages.signup');
    }
    
    public function create(Request $request)
    {
//        $this->validate($request, [
//            'name'=>'required|unique:user|max:50',
//            'email'=>'required|unique:user|email|max:255',
//            'password'=>'required|confirmed|max:6'
//        ]);
        
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        Auth::login($user);
        return redirect()->route('user.info', [$user]);
    }
    
    public function getUser(User $user)
    {
        $statuses = $user->statuses()
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        
        return view('userPages.userInfo', compact('user', 'statuses'));
    }
}
