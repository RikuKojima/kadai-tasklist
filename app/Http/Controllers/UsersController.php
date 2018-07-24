<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;


class UsersController extends Controller
{
    //まずは全てのユーザを表示
    public function index() {
        $users = User::pagenate(10);
        
        return view('users.index', ['users' => $users,]);
    }
    
    public function show($id) {
        $users = User::find($id);
        
        return view('users.show',['user' => $users,]);
    }
}
