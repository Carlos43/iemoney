<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Status;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only'=>['createStatus'],
        ]);
    }
    
    public function getStatusListByUserId(Request $request)
    {
        $id = $request->userId;
        $user = User::find($id);
        $statusList = $user->statuses()->orderBy('created_at', 'desc')->paginate(1);
        return response()->json($statusList, 200);
    }
    
    public function getStatusById(Request $request)
    {
        $id = $request->id;
        $status = Status::find($id);
        return response()->json($status, 200);
    }
    
    public function createStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:10',
        ]);
        
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 500);
        } else {
            $userId = $request->userId;
            $user = User::find($userId);
            $this->authorize('update', $user);
            
            $status = $user->statuses()->create([
                'content'=>$request->content
            ]);
            
            return response()->json($status, 200);
        }
    }
    
    public function deleteStatusById(Request $request)
    {
        $id = $request->id;
        $status = Status::find($id);
        $this->authorize('delete', $status);
        $status->delete();
        return response()->json("Delete Success", 200);
    }
}
