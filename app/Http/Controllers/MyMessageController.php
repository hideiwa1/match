<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bord;
use Illuminate\Support\Facades\Auth;

class MyMessageController extends Controller
{
	public function index(){
		$user = Auth::id();
		$bords = Bord::where('from_user_id', $user)
			->orWhere('to_user_id', $user)
			->get();
		$msgs = [];
		foreach($bords as $bord){
			$msgs[] = $bord -> messages() -> orderBy('updated_at', 'desc') -> first();
		}
		$collection = collect($msgs);
		$sortedMsgs = $collection -> sortByDesc('updated_at')->values();
		return view('myMessage', compact('bords', 'sortedMsgs', 'user'));
	}
}
