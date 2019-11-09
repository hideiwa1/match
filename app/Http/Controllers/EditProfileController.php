<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditProfileController extends Controller
{
    public function index(){
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
}
