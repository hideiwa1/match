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
			if($id === $user){
				return back();
			}else{
				$checks = Bord::where('from_user_id', $id)
					->orWhere('to_user_id', $id)
					->where('from_user_id', $user)
					->orWhere('to_user_id', $user)
					->get();
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
		return view('message', compact('bord', 'messages', 'user'));
	}
	
	public function add($id = '', Request $request){
		$bord = Bord::find($id);
		$message = new Message;
		$message -> comment = $request -> comment;
		$message -> bord_id = $id;
		$message -> from_user_id = Auth::id();
		$message -> to_user_id = ($bord -> from_user_id == Auth::id()) ? $bord -> to_user_id : $bord -> from_user_id;
		$message -> save();
		return back();
	}
}
