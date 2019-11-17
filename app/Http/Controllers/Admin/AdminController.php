<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(){
        return view('admin.index');
    }

    public function userList(){
//        $users = User::all();
        $users = User::where('userType', '=',  null)->get();
//        print_r($users);
        return view('admin.user', compact('users'));
    }
}
