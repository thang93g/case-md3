<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function showFormLogIn()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            \Illuminate\Support\Facades\Session::push('login',true);
            if ($request->email == 'admin') {
                return redirect()->route('admin.showHomeAdmin');
            } else {
                return redirect()->route('home.showHome');
            }
        } else {
            \Illuminate\Support\Facades\Session::push('login-fail',false);
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        return view('login.register');
    }

    public function logOut()
    {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }


}
