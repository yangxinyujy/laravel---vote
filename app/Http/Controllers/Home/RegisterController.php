<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('home/register/index');
    }

    public function register()
    {
        $this->validate(request(),[
            'nickname' => 'required|min:3|unique:users,nickname',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $password = bcrypt(request('password'));
        $nickname = request('nickname');
        $email = request('email');
        $user = \App\User::create(compact('nickname', 'email', 'password'));
        return redirect('/login');
    }
}
