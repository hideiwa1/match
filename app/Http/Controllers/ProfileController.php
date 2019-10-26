<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class ProfileController extends Controller
{
	public function index($id = ''){
		$user = User::find($id);
		$projects = Project::where('user_id', $id)
			-> orderBy('updated_at', 'desc')
			-> take(5)
			-> get();
		return view('profile', compact('user', 'projects'));
	}
}
