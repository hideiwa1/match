<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    
    public function postSignup(Request $request)
    {
        $this -> validate($request, User::$rules);
        /**
        $user = new User;
        $form = $request -> all();
        unset($form['_token']);
        unset($form['password_confirmation']);
        $user -> fill($form) -> save();
        */
        user::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/mypage');
    }
}
