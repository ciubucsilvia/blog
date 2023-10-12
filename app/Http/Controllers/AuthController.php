<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use App\Models\User;

use Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
    	return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
    	$data = $request->all();
        $user = User::add($data);
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
    	return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
    	$result = Auth::attempt([
    		'email' 	=> $request->get('email'),
    		'password' 	=> $request->get('password')
    	]);

    	if($result) {
    		return redirect('/');
    	}

    	return redirect()->back()->with('status', 'Email sau parola gresita');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/login');
    }
}
