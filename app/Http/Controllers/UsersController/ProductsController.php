<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Products;
use DB;

class ProductsController extends Controller
{
    public function get()
    {
        $food = DB::table('products')->get();
        return response()->json($food);
    }
    public function wishlistproducts()
    {
        $food = DB::table('wishlists')->get();
        return response()->json($food);
    }
    public function food()
    {
        $product = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->where('category_id', '=', 1)
        ->get();
        return response()->json($product);
    }
    public function categories1()
    {
        $product = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->where('category_id', '=', 2)
        ->get();
        // $food = DB::table('products')->where('id', '=', 3)->get();
        return response()->json($product);
    }

    public function slideID(){
        $slideID = DB::table('ads')->where('id', '=', 1)->get();
        return response()->json($slideID);
    }
    public function search(Request $request){
        $product = $request->searchInput;
        $product = Products::where('name', 'like', '%'.$product.'%')->get();
        return response()->json($product);
    }

    public function categories(){
        $category = Category::all();
        return response()->json($category);
    }
}


