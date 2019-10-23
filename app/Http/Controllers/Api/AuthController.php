<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use App\Auth;
//use App\User;

class AuthController extends Controller
{
    public function index()
    {
//			$user = User::all();
			$user = Auth::id();
        return $user;
    }
}
