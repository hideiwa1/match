<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getAuth(Request $request)
    {
        $msg = 'ログインしてください';
        return view('login', ['message' => $msg]);
    }
    
    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $msg = 'ログインしました';
            return redirect('/mypage');
        }else{
            $msg = 'ログインに失敗しました';
            return view('login', ['message' => $msg]);
        }
    }
}
