<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
	/*お気に入りフラグの判定*/
    public function index(Request $request){
			$id = $request -> id;
			$user = Auth::user()->id;
			$like = Like::where('project_id', $id)
				-> where('user_id', $user)
				-> count();
			return $like;
		}
	
	/*お気に入りフラグの切り替え、登録*/
	public function toggle(Request $request){
		$flg = $request -> like_flg;
		$id = $request -> id;
		$user = Auth::user()->id;
		
		/*trueの場合、削除*/
		if($flg == 'true'){
			$like = Like::where('project_id', $id)
				-> where('user_id', $user)
				-> delete();
			return 'false' ;
		}else{
			/*falseの場合、登録*/
			$like = new Like;
			$like -> project_id = $id;
			$like -> user_id = $user;
			$like -> save();
			return 'true';
		}
	}

}
