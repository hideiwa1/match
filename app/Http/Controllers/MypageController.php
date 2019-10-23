<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Like;

class MypageController extends Controller
{
    public function index()
    {
			$user_id = Auth::id();
			$projects = Project::where('user_id', $user_id)
				->take(5) -> get();
			$likes = Like::where('user_id', $user_id)
				->take(5) -> get();
        return view('mypage', compact('projects', 'likes'));
    }
}
