<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Category;

class ProjectController extends Controller
{
	public function index()
	{
		$projects = project::paginate(10);
		$data = [];
		foreach($projects as $project){
			$data[] =[
				'id' => $project -> id,
				'title' => $project -> title,
				'category' => $project -> category -> name,
				'min' => $project -> min_price,
				'max' => $project -> max_price
			];
		}
		$res = [];
		$res['project'] = $projects;
		$res['data'] = $data;
		//			$pro = $projects[data];
		return $res;
	}

		public function search(Request $request)
		{
			$title = $request -> keyword;
			$min = $request -> min;
			$max = $request -> max;
			
			$category = [];
			$request -> single == 'true' && $category[] = 1;
			$request -> share == 'true' && $category[] = 2;

			$sql = [];
			$title && $sql[] = ['title', 'LIKE', '%'.$title.'%'];
			$min && $sql[] = ['min_price', '>=', $min];
			$max && $sql[] = ['max_price', '<=', $max];
			
			$category ? 
				$projects = project::where($sql) -> whereIn('category_id', $category) -> paginate(7)
					:$projects = project::where($sql) -> paginate(7);
			
//			$projects = project::all();
			$data = [];
			foreach($projects as $project){
				$data[] =[
					'id' => $project -> id,
					'title' => $project -> title,
					'category' => $project -> category -> name,
					'min' => $project -> min_price,
					'max' => $project -> max_price
				];
			}
			$res = [];
			$res['project'] = $projects;
			$res['data'] = $data;
//			$pro = $projects[data];
			return $res;
		}
}
