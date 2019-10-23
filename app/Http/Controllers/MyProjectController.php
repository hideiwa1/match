<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class MyProjectController extends Controller
{
    public function index(){
			$user = Auth::user()->id;
			$projects = Project::where('user_id', $user) ->get();
			return view('myProject', compact('projects'));
		}
}
