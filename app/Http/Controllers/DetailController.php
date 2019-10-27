<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Project;
use App\Attender;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
	public function index($id = ''){
		$detail = Project::find($id);
		$comments = Comment::where('project_id', $id)->get();
		if (Auth::check()){
			$user = Auth::user()->id;
		}else{
			$user = '';
		}
		$attenders = Attender::where('project_id', $id)->get();
		$attendFlg = Attender::where('project_id', $id)
			-> where('user_id', $user) -> get();
		if(!$attendFlg -> count()){
			$attendFlg = '';
		}
		
		return view('detail', compact('detail', 'comments', 'user', 'attenders', 'attendFlg'));
	}
	
	public function add($id= '', Request $request){
		if($request -> edit){
			/*編集時*/
			return redirect() -> action('RegistProjectController@regist', ['id' => $id]);
		}elseif($request -> comit){
			/*応募時*/
			$attender = new Attender;
			$attender->project_id = $id;
			$attender->user_id = Auth::id();
			$attender->save();
			/*Projectsテーブルのupdated_atを更新*/
			$project = Project::find($id);
			$to_user_id = $project -> user_id;
			$title = $project -> title;
			$project -> touch();
			/*応募DMを送信*/
			$message = new MessageController;
			$message -> attend($to_user_id, $id, $title);
			return redirect() -> action('DetailController@index', ['id' => $id]);
		}else{
			/*コメント時*/
			$this -> validate($request, Comment::$rules);
			$comment = new Comment;
			$comment->comment = $request->comment;
			$comment->user_id = Auth::user()->id;
			$comment->project_id = $id;
			$comment->save();
			return back();
		}
	}
	
}
