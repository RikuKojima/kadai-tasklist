<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    //まずは全てのユーザを表示
    public function index() {
        $users = User::paginate(10);
        
        return view('users.index', ['users' => $users,]);
    }
    
    $data = []
    public function show($id) {
        $user = User::find($id);
        $tasks = $user->task()->orderBy('created_at','desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'tasks' =>$tasks,
            ];
        
        $data += $this->counts($user);
        return view('users.show',$data);
    }
}
