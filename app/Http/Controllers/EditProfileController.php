<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function index(){
			$data = User::find(Auth::id());
			return view('editProfile', compact('data'));
		}
	
	public function add(Request $request){
		$user = User::find(Auth::id());
		$user -> name = $request -> name;
		$user -> email = $request -> email;
		$rules = ['pic' => 'image|max:2000'];
		if($request -> file('pic')){
			$this -> validate($request, $rules);
			$path = $request -> file('pic') -> store('public/profile-pic');
		$user -> pic = str_replace('public/', '', $path);
		}
		$user -> comment = $request -> comment;
		$user -> save();
		return back();
		//return view('editProfile', compact('data'));
	}
}
