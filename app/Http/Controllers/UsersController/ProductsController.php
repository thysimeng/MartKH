<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
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
        $food = DB::table('products')->where('id', '=', 2)->get();
        return response()->json($food);
    }

    public function search(Request $request){
        // dd($request);
        $product = $request->searchInput;
        // return response()->json($product);
        // $search = json([$request->searchInput]);
        $product = Products::where('name', 'like', '%'.$product.'%')->get();
        // $food = DB::table('products')->get();
        // return response()->json([$request->a]);
        return response()->json($product);
    }
}


