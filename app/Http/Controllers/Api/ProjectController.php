<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Category;

class ProjectController extends Controller
{
	/*案件情報の取得（10件ずつ）*/
	public function index()
	{
		$projects = project::orderBy('updated_at', 'desc') -> paginate(10);
		$data = [];
		/*案件情報の展開*/
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
		return $res;
	}
	
	/*検索結果の取得*/
	public function search(Request $request)
	{
			$title = $request -> keyword;
			$min = $request -> min;
			$max = $request -> max;
			
		/*カテゴリー名によるidの登録*/
			$category = [];
			$request -> single == 'true' && $category[] = 1;
			$request -> share == 'true' && $category[] = 2;
			
			/*SQL文の作成*/
			$sql = [];
			$title && $sql[] = ['title', 'LIKE', '%'.$title.'%'];
			$min && $sql[] = ['min_price', '>=', $min];
			$max && $sql[] = ['max_price', '<=', $max];
			
			$category ? 
				$projects = project::where($sql) 
					-> whereIn('category_id', $category)
					-> orderBy('updated_at', 'desc')
					-> paginate(10)
				:$projects = project::where($sql) 
					-> orderBy('updated_at', 'desc')
					-> paginate(10);
			
			$data = [];
		/*案件情報の展開*/
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
			return $res;
	}
	
	/*案件詳細情報（1件）の取得*/
	public function detail(Request $request){
		$id = $request;
		$data = Project::find($id);
		return $data;
	}
}
