<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', [
            'except'=>['register', 'login', 'loginForTestPage', 'getUserList'],
        ]);
        
        $this->middleware('guest', [
            'only'=>['register', 'login'],
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:user|max:50',
            'email' => 'required|email|unique:user|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 500);
        } else {
            $isAdmin = false;
            if($request->isAdmin === "on") {
                $isAdmin = true;
            }
           
            $user = User::create([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'is_admin'=>$isAdmin,
            ]);
            
            Auth::login($user);
            
            return response()->json($user, 200);
        }
    }
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 500);
        } else {
            $email = $request->email;
            $password = $request->password;
            $hasRemember = $request->has('remember');
            if(Auth::attempt(['email'=>$email, 'password'=>$password], $hasRemember)) {
                return response()->json('Login Success', 200);
            } else {
                return response()->json('Login Fail', 200);
            }
        }
    }
    
    public function getCurrentInfo()
    {
        return response()->json(Auth::user(), 200);
    }
    
    public function logout()
    {
        Auth::logout();
        return response()->json('Logout Success', 200);
    }
    
    public function getUserById(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return response()->json($user, 200);
    }
    
    public function getUserList(Request $request)
    {
        $username = $request->username;
        if(strlen($username)===0) {
            $users = User::paginate(1);
            return response()->json($users, 200);
        } else {
            $users = User::where('username', 'like', '%'.$username.'%')->paginate(1);
            return response()->json($users, 200);
        }
    }
    
    public function loginForTestPage(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $this->authorize('update', $user);
        Auth::login($user);
        return view('static_pages/user_update', compact('user'));
    }
    
    public function updateUser(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 500);
        } else {
            $user->update([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            
            return response()->json($user, 200);
        }
    }
    
    public function deleteUserById(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $this->authorize('delete', $user);
        $user->delete();
        return response()->json("Delete Success", 200);
    }
    
    public function getFollowers(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $followers = $user->followers()->paginate(1);
        return response()->json($followers, 200);
    }
    
    public function getFollowings(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $followings = $user->followings()->paginate(1);
        return response()->json($followings, 200);
    }
    
    public function follow(Request $request)
    {
        $user_id = $request->userId;
        $user = User::find($user_id);
        $this->authorize('follow', $user);
        if(!Auth::user()->isFollowing($user_id)) {
            Auth::user()->follow($user_id);
        }
        return response()->json("Follow Success", 200);
    }
    
    public function unfollow(Request $request)
    {
        $user_id = $request->userId;
        $user = User::find($user_id);
        $this->authorize('follow', $user);
        if(Auth::user()->isFollowing($user_id)) {
            Auth::user()->unfollow($user_id);
        }
        return response()->json("UnFollow Success", 200);
    }
}

