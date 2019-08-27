<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserHomeController extends Controller
{
    public function index(){
        $productPopular = DB::table('products')->limit(9)->get();
        $productSlide = DB::table('slide')->get();
        return view('users.userHomePage', compact('productPopular', 'productSlide'));
    }

    public function get(Request $request)
    {
        $posts = User::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }
}
