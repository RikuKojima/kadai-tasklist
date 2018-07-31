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
    
    
    public function show($id) {
        $user = User::find($id);
        $tasks = $user->tasks()->orderBy('created_at','status')->paginate(10);
        
        $data = [
            'user' => $user,
            'tasks' =>$tasks,
            ];
        
        $data += $this->counts($user);
        return view('tasks.index',$data);
    }
}
