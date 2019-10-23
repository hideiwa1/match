<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class MyCommentController extends Controller
{
	public function index(){
		$user = Auth::user() -> id;
		$comments = Comment::where('user_id', $user) ->get();
		return view('myComment', compact('comments'));
	}
}
