<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	
	protected $guarded = array('id');

	public static $rules = array(
		'comment' => 'required',
	);
	
	public function fromUser(){
		return $this -> belongsTo('App\User', 'from_user_id');
	}

	public function toUser(){
		return $this -> belongsTo('App\User', 'to_user_id');
	}
}
