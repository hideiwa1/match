<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class RegistProjectController extends Controller
{
	public function regist($id = 'new'){
		if($id !== 'new'){
			$title = '登録案件編集';
			$data = Project::find($id);
		}else{
			$title = '新規案件登録';
			$data = '';
		}
		return view('registProject', compact('title', 'id', 'data'));
	}
	
	public function save($id = '', Request $request){
		$title = '登録完了';
//		$this -> validate($request, Project::$rules);
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
		$data = '';
		
		return view('registProject', compact('title', 'id', 'data'));
/*			$this -> validate($request, Comment::$rules);
		$comment = new Comment;
		$comment->comment = $request->comment;
		$comment->user_id = Auth::user()->id;
		$comment->project_id = $id;
		$comment->save();
		return back();
		*/
	}
}
