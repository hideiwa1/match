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
		
		return view('detail', compact('detail', 'comments', 'user', 'attenders'));
	}
	
	public function add($id= '', Request $request){
		if($request -> edit){
			return redirect() -> action('RegistProjectController@regist', ['id' => $id]);
		}elseif($request -> comit){
			$attender = new Attender;
			$attender->project_id = $id;
			$attender->user_id = Auth::user()->id;
			$attender->save();
			return back();
		}else{
			//$this -> validate($request, Comment::$rules);
			$comment = new Comment;
			$comment->comment = $request->comment;
			$comment->user_id = Auth::user()->id;
			$comment->project_id = $id;
			$comment->save();
			return back();
		}
	}
	
	public function comit($id=''){
		
	}
}
