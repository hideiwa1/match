<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $guarded = array('id');

	public function projects(){
		return $this -> hasMany('App\Project');
	}
}
