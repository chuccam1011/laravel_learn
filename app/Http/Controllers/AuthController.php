<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegister;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }


    public function getSubmitRegister(UserRegister $request)
    {
        dd($request->all());
    }

}
