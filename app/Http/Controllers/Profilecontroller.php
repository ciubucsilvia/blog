<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class Profilecontroller extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('pages.profile', compact('user'));
    }

    public function store(Request $request)
    {
    	$user = Auth::user();

    	$this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => [
                                'required',
                                'email',
                                Rule::unique('users')->ignore($user->id)
                            ],
            'avatar'    => 'nullable|image'
        ]);

        $data = $request->all();

        $user->edit($data);
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Profile is updated');
    }
}
