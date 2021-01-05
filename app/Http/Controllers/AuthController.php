<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth_login');
    }

    public function getFormSubmit(Request $request)
    {
        dd($request->email,$request->pass);
    }
}
