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
        /**
        $user = new User;
        $form = $request -> all();
        unset($form['_token']);
        unset($form['password_confirmation']);
        $user -> fill($form) -> save();
        */
			$email = $request -> email;
			$password = $request -> password;
			$emailCheck = User::where('email', $email) -> exists();
/*			if($emailCheck){
				$msg = 'メールアドレスはすでに登録されています';
				return view('signup', compact('msg'));
			}else{
*/        user::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
			Auth::attempt(['email' => $email, 'password' => $password]);
        return redirect('/mypage');
			
    }
}
