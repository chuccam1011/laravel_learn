<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        return view('auth.login');

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('posts.index');
        }
        return redirect()->route('getlogin');
    }

}
