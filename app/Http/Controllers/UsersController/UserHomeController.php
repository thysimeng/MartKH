<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserHomeController extends Controller
{
    public function index(){
        $message = 'hello';
        return view('users.userHomePage', compact('message'));
    }

    public function get(Request $request)
    {
        $posts = User::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }
}
