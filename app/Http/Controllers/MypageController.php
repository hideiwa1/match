<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Like;
use App\Comment;
use App\Message;
use App\Bord;

class MypageController extends Controller
{
    public function index()
    {
			$user_id = Auth::id();
			$projects = Project::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			$likes = Like::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			$comments = Comment::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			$bords = Bord::where('from_user_id', $user_id)
				->orWhere('to_user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			$messages = [];
			foreach($bords as $bord){
				$msg = '';
				$msg = $bord -> messages() -> orderBy('updated_at', 'desc') -> first();
				if($msg){
				$messages[] = $msg;
				}
			}
			$messages = collect($messages);
			
			return view('myPage', compact('projects', 'likes', 'comments', 'messages', 'bords', 'user_id'));
    }
}
