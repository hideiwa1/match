<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function create(Request $request)
    {
      $this -> validate($request, User::$rules);
      $user = new User;
      $form = $request -> all();
      unset($form['_token']);
      unset($form['password_confirmation']);
      $user -> fill($form) -> save();
      return redirect('/user');
    }
	
	public function signup()
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
	
	public function edit(){
		$data = User::find(Auth::id());
		return view('editProfile', compact('data'));
	}

	public function add(Request $request){
		$user = User::find(Auth::id());
		$rules = ['email' => 'required|email|unique:users,email,'.$user->id];
		$this -> validate($request, $rules);
		$user -> name = $request -> name;
		$user -> email = $request -> email;
		$rules = ['pic' => 'image|max:2000'];
		if($request -> file('pic')){
			$this -> validate($request, $rules);
			/*herokuでは画像の保存ができないため、AWS s3を利用*/
			$path = Storage::disk('s3') -> putFile('/', $request -> file('pic'), 'public');
			$user -> pic = Storage::disk('s3') -> url($path);
		}
		$user -> comment = $request -> comment;
		$user -> save();
		return back()->with('message', '登録完了');
	}
	
	public function profile($id = ''){
		$user = User::find($id);
		$projects = Project::where('user_id', $id)
			-> orderBy('updated_at', 'desc')
			-> take(5)
			-> get();
		if(Auth::id()){
			$myId = Auth::id();
		}else{
			$myId = '';
		}
		return view('profile', compact('user', 'projects', 'myId'));
	}
}
