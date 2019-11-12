<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Attender;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
	public function project(){
		return view('project');
	}
	
	public function regist($id = 'new'){
		if($id !== 'new'){
			$title = '登録案件編集';
			$data = Project::find($id);
			$user = Auth::id();
			if($data -> user_id !== $user){
				return redirect('mypage');
			}
		}else{
			$title = '新規案件登録';
			$data = '';
		}
		return view('registProject', compact('title', 'id', 'data'));
	}

	public function save($id = '', Request $request){
		$title = '登録完了';
		$this -> validate($request, Project::$rules);
		if($id === 'new'){
			$project = new Project;
		}else{
			$project = Project::find($id);
		}
		$project -> title = $request->title;
		$project -> category_id = $request->category_id;
		$project -> min_price = $request->min_price;
		$project -> max_price = $request->max_price;
		$project -> comment = $request->comment;
		$project->user_id = Auth::user()->id;
		$project -> save();
		if($id === 'new'){
			$last_insert_id = $project ->id;
			$data = Project::find($last_insert_id);
			$id = $last_insert_id;
		}else{
			$data = Project::find($id);
		}
		return redirect() -> action('DetailController@index', [$id])->with('message', '登録完了');
	}
	
	public function detail($id = ''){
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
			return redirect() -> action('ProjectController@regist', ['id' => $id]);
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
			return redirect() -> action('ProjectController@detail', ['id' => $id])->with('message', '応募しました');
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
