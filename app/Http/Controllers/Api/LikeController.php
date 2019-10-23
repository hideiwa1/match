<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
    public function index(Request $request){
			$id = $request -> id;
			$user = Auth::user()->id;
			$like = Like::where('project_id', $id)
				-> where('user_id', $user)
				-> count();
//				->get();
			return $like;
		}
	
	public function toggle(Request $request){
		$flg = $request -> like_flg;
		$id = $request -> id;
		$user = Auth::user()->id;
//		return $flg;
		
		if($flg == 'true'){
			$like = Like::where('project_id', $id)
				-> where('user_id', $user)
				-> delete();
			return 'false' ;
		}else{
			$like = new Like;
			$like -> project_id = $id;
			$like -> user_id = $user;
			$like -> save();
			return 'true';
		}
	}

}
