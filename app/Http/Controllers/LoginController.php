<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	/*ログインページの表示*/
    public function getAuth(Request $request)
    {
        $msg = 'ログインしてください';
        return view('login', ['message' => $msg]);
    }
    
	/*ログイン処理、マイページへ遷移*/
    public function postAuth(Request $request)
    {
			$this -> validate($request, User::$loginRules);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
					return redirect('/mypage')->with('message', 'ログインしました');
        }else{
					return redirect('/login')->with('message', 'ログインに失敗しました');
        }
    }
}
