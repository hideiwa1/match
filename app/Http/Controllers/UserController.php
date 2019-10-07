<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $request)
    {
      return view('signup');
    }

    public function create(Request $request)
    {
      $this -> validate($request, User::$rules);
      $user = new User;
      $form = $request -> all();
      unset($form['_token']);
      unset($form['password_confirmation']);
      $user -> fill($form) -> save();
      return redirect('/user');
    }
}
