<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{


    use AuthenticatesUsers;


//    protected $redirectTo = '/home';
    protected function redirectTO(){

        if (Auth::user()->userType == 'admin'){
            return 'admin';
        }else{
            return 'home';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

//    protected function credentials(Request $request)
//    {
//        return ['email' => $request{$this->username()} , 'password' => $request->password, 'status' => '1' ];
//    }
}
