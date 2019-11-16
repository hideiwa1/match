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
	/*案件検索一覧を表示*/
	public function project(){
		return view('project');
	}
	
	/*案件の登録、編集*/
	public function regist($id = 'new'){
		/*idパラメータにより新規登録、編集の分岐*/
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
	
	/*案件の登録*/
	public function save($id = '', Request $request){
		//$title = '登録完了';
		/*バリデーション*/
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
			/*案件情報登録後、idを取得*/
			$last_insert_id = $project ->id;
			$data = Project::find($last_insert_id);
			$id = $last_insert_id;
		}else{
			$data = Project::find($id);
		}
		/*登録後、商品詳細ページにリダイレクト*/
		return redirect() -> action('ProjectController@detail', [$id])->with('message', '登録完了');
	}
	
	/*商品詳細ページの表示*/
	public function detail($id = ''){
		/*案件情報の取得*/
		$detail = Project::find($id);
		/*コメントを取得*/
		$comments = Comment::where('project_id', $id)->get();
		if (Auth::check()){
			$user = Auth::user()->id;
		}else{
			$user = '';
		}
		/*応募者一覧を取得*/
		$attenders = Attender::where('project_id', $id)->get();
		/*応募済みか否か判定*/
		$attendFlg = Attender::where('project_id', $id)
			-> where('user_id', $user) -> get();
		if(!$attendFlg -> count()){
			$attendFlg = '';
		}
		return view('detail', compact('detail', 'comments', 'user', 'attenders', 'attendFlg'));
	}

	/*detailページのsubmit時の処理*/
	public function add($id= '', Request $request){
		/*submit nameによる分岐*/
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
