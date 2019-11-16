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
	/*マイページの表示*/
    public function index()
    {
			$user_id = Auth::id();
			/*登録案件の取得*/
			$projects = Project::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			/*お気に入りの取得*/
			$likes = Like::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			/*コメントの取得*/
			$comments = Comment::where('user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			/*DMのある板の取得*/
			$bords = Bord::where('from_user_id', $user_id)
				->orWhere('to_user_id', $user_id)
				->orderBy('updated_at', 'desc')
				->take(5) -> get();
			/*各板の最新DMを取得*/
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
	
	/*DMのある板の取得*/
	public function myMessage(){
		$user = Auth::id();
		$bords = Bord::where('from_user_id', $user)
			->orWhere('to_user_id', $user)
			->orderBy('updated_at', 'desc')
			->get();
		/*各板の最新DMを取得*/
		$messages = [];
		foreach($bords as $bord){
			$msg = '';
			$msg = $bord -> messages() -> orderBy('updated_at', 'desc') -> first();
			if($msg){
				$messages[] = $msg;
			}
		}
		$collection = collect($messages);
		$sortedMsgs = $collection -> sortByDesc('updated_at')->values();
		return view('myMessage', compact('bords', 'sortedMsgs', 'user'));
	}
	/*お気に入り一覧を取得*/
	public function myLike(){
		$user = Auth::id();
		$likes = Like::where('user_id', $user) ->get();
		return view('myLike', compact('likes'));
	}
	
	/*コメント一覧を取得*/
	public function myComment(){
		$user = Auth::user() -> id;
		$comments = Comment::where('user_id', $user) ->get();
		return view('myComment', compact('comments'));
	}
	
	/*登録案件一覧を取得*/
	public function myProject(){
		$user = Auth::user()->id;
		$projects = Project::where('user_id', $user) ->get();
		return view('myProject', compact('projects'));
	}
}
