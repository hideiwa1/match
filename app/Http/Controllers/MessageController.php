<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bord;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function check($id = ''){
			$user = Auth::id();
			\Log::info('user:'.$user);
			if($id === $user){
				return back();
			}else{
				\Log::info('テスト2');
				$checks = Bord::where(function($query) use ($id){
					$query -> where('from_user_id', $id);
					$query -> orWhere('to_user_id', $id);
				})
					->where(function($query) use ($user){
						$query -> where('from_user_id', $user);
						$query -> orWhere('to_user_id', $user);
					})
					->get();
				\Log::info($checks);
				if($checks -> count()){
					foreach($checks as $check){
						$bord_id = $check -> id;
					}
				}else{
					$bord = new Bord;
					$bord->from_user_id = $user;
					$bord->to_user_id = $id;
					$bord->save();
					$bord_id = $bord -> id;
				}
				return redirect() -> route('message', ['id' => $bord_id]);
			}
		}
	
	public function index($id = ''){
		$bord = Bord::find($id);
		$messages = Message::where('bord_id', $id) -> get();
		$user = Auth::id();
		if($bord -> from_user_id !== $user && $bord -> to_user_id !== $user){
			return redirect('mypage');
		}
		return view('message', compact('bord', 'messages', 'user'));
	}
	
	public function add($id = '', Request $request){
		$this -> validate($request, Message::$rules);
		$bord = Bord::find($id);
		$message = new Message;
		$message -> comment = $request -> comment;
		$message -> bord_id = $id;
		$message -> from_user_id = Auth::id();
		$message -> to_user_id = ($bord -> from_user_id == Auth::id()) ? $bord -> to_user_id : $bord -> from_user_id;
		$message -> save();
		/*Bordsテーブルのupdated_atを更新*/
		$bord -> touch();
		return back();
	}
	
	public function attend($to_user_id = '', $project_id = '', $title = ''){
		\Log::info($to_user_id);
		$user = Auth::id();
		$checks = Bord::where(function($query) use ($to_user_id){
			$query -> where('from_user_id', $to_user_id);
			$query -> orWhere('to_user_id', $to_user_id);
		})
			->where(function($query) use ($user){
				$query -> where('from_user_id', $user);
				$query -> orWhere('to_user_id', $user);
			})
			->get();
		\Log::info($checks);
		if($checks -> count()){
			foreach($checks as $check){
				$bord_id = $check -> id;
			}
		}else{
			$bord = new Bord;
			$bord->from_user_id = $user;
			$bord->to_user_id = $to_user_id;
			$bord->save();
			$bord_id = $bord -> id;
			$bord -> touch();
		}
		$message = new Message;
		$message -> comment = $title.'に応募しました';
		$message -> bord_id = $bord_id;
		$message -> from_user_id = $user;
		$message -> to_user_id = $to_user_id;
		$message -> save();
//		return view('detail', ['id' => $project_id]);
		return redirect() -> action('ProjectController@detail', ['id' => $project_id]);
	}
	
}
