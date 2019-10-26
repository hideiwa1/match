<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	
	protected $guarded = array('id');
	
	public function project(){
			return $this -> belongsTo('App\Project');
		}
}
