<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;

class MyLikeController extends Controller
{
	public function index(){
		$user = Auth::id();
		$likes = Like::where('user_id', $user) ->get();
		return view('myLike', compact('likes'));
	}
}
