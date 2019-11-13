<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Like;
use App\Comment;
use App\Message;
use App\Bord;

class MyPageController extends Controller
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
	
	public function myMessage(){
		$user = Auth::id();
		$bords = Bord::where('from_user_id', $user)
			->orWhere('to_user_id', $user)
			->orderBy('updated_at', 'desc')
			->get();
		$msgs = [];
		foreach($bords as $bord){
			$msg = '';
			$msg = $bord -> messages() -> orderBy('updated_at', 'desc') -> first();
			if($msg){
				$messages[] = $msg;
			}
		}
		$collection = collect($msgs);
		$sortedMsgs = $collection -> sortByDesc('updated_at')->values();
		return view('myMessage', compact('bords', 'sortedMsgs', 'user'));
	}
	
	public function myLike(){
		$user = Auth::id();
		$likes = Like::where('user_id', $user) ->get();
		return view('myLike', compact('likes'));
	}
	
	public function myComment(){
		$user = Auth::user() -> id;
		$comments = Comment::where('user_id', $user) ->get();
		return view('myComment', compact('comments'));
	}
	
	public function myProject(){
		$user = Auth::user()->id;
		$projects = Project::where('user_id', $user) ->get();
		return view('myProject', compact('projects'));
	}
}
