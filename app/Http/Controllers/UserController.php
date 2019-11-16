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
	
	/*新規登録画面の表示*/
	public function signup()
	{
		return view('signup');
	}

	/*ユーザー情報の登録*/
	public function postSignup(Request $request)
	{
		/*バリデーション*/
		$this -> validate($request, User::$rules,['email:unique' => 'そのメールアドレスはすでに使用されています']);
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
	
	/*プロフィール編集画面の表示*/
	public function edit(){
		$data = User::find(Auth::id());
		return view('editProfile', compact('data'));
	}

	/*プロフィール変更の登録*/
	public function add(Request $request){
		$user = User::find(Auth::id());
		/*重複チェックより自信を除外*/
		$rules = [
			'email' => 'required|email|unique:users,email,'.$user->id,
			'name' => 'max:191',];
		/*バリデーション*/
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
	
	/*プロフィール画面の表示*/
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
