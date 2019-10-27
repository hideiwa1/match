<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfilePicController extends Controller
{
	public function index(){
		$data = User::find(Auth::id())->pic;
		return $data;
	}
}
