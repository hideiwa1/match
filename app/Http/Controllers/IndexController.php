<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class IndexController extends Controller
{
	/*トップページの表示、最新5件の案件取得*/
    public function index(){
			$projects = Project::orderBy('updated_at', 'desc')
				->take(5) -> get();
			return view('index', compact('projects'));
		}
}
