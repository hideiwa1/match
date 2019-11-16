<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bord;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
	/*メッセージボードの有無、引数は相手ユーザーid*/
    public function check($id = ''){
			$user = Auth::id();
			/*本人の場合*/
			if($id === $user){
				return back();
			}else{
				/*本人でない場合*/
				$checks = Bord::where(function($query) use ($id){
					/*ボードの送受信ユーザーが相手のユーザーか*/
					$query -> where('from_user_id', $id);
					$query -> orWhere('to_user_id', $id);
				})
					->where(function($query) use ($user){
						/*ボードの送受信ユーザーが自分か*/
						$query -> where('from_user_id', $user);
						$query -> orWhere('to_user_id', $user);
					})
					->get();
				if($checks -> count()){
					/*ボードが作成済みの場合*/
					foreach($checks as $check){
						$bord_id = $check -> id;
					}
				}else{
					/*ボードが未作成の場合*/
					$bord = new Bord;
					$bord->from_user_id = $user;
					$bord->to_user_id = $id;
					$bord->save();
					$bord_id = $bord -> id;
				}
				return redirect() -> route('message', ['id' => $bord_id]);
			}
		}
	
	/*DMページの表示*/
	public function index($id = ''){
		$bord = Bord::find($id);
		$messages = Message::where('bord_id', $id) -> get();
		$user = Auth::id();
		/*自分が送受信ユーザーでない場合*/
		if($bord -> from_user_id !== $user && $bord -> to_user_id !== $user){
			return redirect('mypage');
		}
		return view('message', compact('bord', 'messages', 'user'));
	}
	
	/*メッセージの書き込み*/
	public function add($id = '', Request $request){
		/*バリデーション*/
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
	
	/*応募時の自動メッセージ送信*/
	public function attend($to_user_id = '', $project_id = '', $title = ''){
		$user = Auth::id();
		$checks = Bord::where(function($query) use ($to_user_id){
			/*ボードの送受信ユーザーが相手のユーザーか*/
			$query -> where('from_user_id', $to_user_id);
			$query -> orWhere('to_user_id', $to_user_id);
		})
			->where(function($query) use ($user){
				/*ボードの送受信ユーザーが自分か*/
				$query -> where('from_user_id', $user);
				$query -> orWhere('to_user_id', $user);
			})
			->get();
		if($checks -> count()){
			foreach($checks as $check){
				/*ボードが作成済みの場合*/
				$bord_id = $check -> id;
				/*Bordsテーブルのupdated_atを更新*/
				$bord = Bord::find($bord_id);
				$bord -> touch();
			}
		}else{
			/*ボードが未作成の場合*/
			$bord = new Bord;
			$bord->from_user_id = $user;
			$bord->to_user_id = $to_user_id;
			$bord->save();
			$bord_id = $bord -> id;
		}
		/*応募の自動メッセージを作成*/
		$message = new Message;
		$message -> comment = $title.'に応募しました';
		$message -> bord_id = $bord_id;
		$message -> from_user_id = $user;
		$message -> to_user_id = $to_user_id;
		$message -> save();
		return redirect() -> action('ProjectController@detail', ['id' => $project_id]);
	}
	
}
