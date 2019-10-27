<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    
    public function postSignup(Request $request)
    {
      $this -> validate($request, User::$rules);
			$email = $request -> email;
			$password = $request -> password;
			$emailCheck = User::where('email', $email) -> exists();
        user::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
			Auth::attempt(['email' => $email, 'password' => $password]);
        return redirect('/mypage');
			
    }
}
