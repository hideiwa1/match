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
      'email' => 'required|email',
      'password' => 'required|min:4|confirmed'
    );
}
