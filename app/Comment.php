<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = array('id');

	public static $rules = array(
		'comment' => 'required',
	);
	
	public function user(){
		return $this -> belongsTo('App\User');
	}
	
	public function project(){
		return $this -> belongsTo('App\Project');
	}
	
}
