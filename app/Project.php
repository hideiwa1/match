<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	
	protected $guarded = array('id');

	/*バリデーションルール*/
	public static $rules = array(
		'title' => 'required|max:191',
		'comment' => 'required',
		'min_price' => 'required|integer|gte:0',
		'max_price' => 'required|integer|gte:min_price',
		'category_id' => 'required|integer',
	);
	
	public function user(){
			return $this -> belongsTo('App\User');
		}
	
	public function category(){
		return $this -> belongsTo('App\Category');
	}
	
	public function likes(){
		return $this -> hasMany('App\Like');
	}
	
	public function comments(){
		return $this -> hasMany('App\Comment');
	}
}
