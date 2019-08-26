<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function get()
    {
        $food = DB::table('products')->get();
        return response()->json($food);
    }
    public function food()
    {
        $food = DB::table('products')->where('pid', '=', 14)->get();
        return response()->json($food);
    }
}
