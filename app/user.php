<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $guarded = array('id');

    public static $rules = array(
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:4|confirmed'
    );
	
	public function Projects(){
		return $this -> hasMany('App\Category');
	}
	
	public function Comments(){
		return $this -> hasMany('App\Comment');
	}
	
	public function Attenders(){
		return $this -> hasMany('App\Attender');
	}
	
	public function Bords(){
		return $this -> hasMany('App\Bord');
	}
}
