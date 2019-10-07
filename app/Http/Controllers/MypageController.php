<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MypageController extends Controller
{
    public function index()
    {
        $msg = Auth::user();
        return view('mypage', ['msg' => $msg]);
    }
}
