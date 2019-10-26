<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class IndexController extends Controller
{
    public function index(){
			$projects = Project::orderBy('updated_at', 'desc')
				->take(5) -> get();
			return view('index', compact('projects'));
		}
}
