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
}
