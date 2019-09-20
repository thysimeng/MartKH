<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Products;
use DB;
use Config;
use Session;
class ProductsController extends Controller
{
    function __construct() { $this->template = "1";}
    public function get()
    {
        // $food = DB::table('products')->get();
        // return response()->json($food);
        $product = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->get();
        return response()->json($product);
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

    public function adsID(Request $request){
        $template_id = $request->template_id;
        if($template_id == '1'){
            // session(['template_id' => '1']);
            session()->put('template_id', 1);
            $set_template = session()->get('template_id');
        }elseif($template_id == '2'){
            // session(['template_id' => '2']);
            session()->put('template_id', 2);
            $set_template = session()->get('template_id');
        }
        elseif($template_id == '3'){
            // session(['template_id' => '3']);
            session()->put('template_id', 3);
            $set_template = session()->get('template_id');
        }
        // return($this->template);
        // $adsID = DB::table('ads')->where('id', '=', $template_id)->get();
        // return 2;
        // return ;
        // dd($template_id);
        // Session::flush();
        // session(['ik' => '2']);
        return response()->json($set_template);
    }

    public function setTemplateID(){
        // if(session()->get('template_id') === NULL){
        //     return 3;
        // }else{
            $set_template = session()->get('template_id');
            return response()->json($set_template);
        // }
    }

    public function slidedatadisplay(){
        // $slideData = DB::table('ads')->where('position', '=', 'left1')->get();
        // return response()->json($slideData);
        $set_template = session()->get('template_id');
        // if($set_template == 1){
        //     $adsMiddle1 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'middle1'],
        //             ])
        //                 ->get();
        //     $adsLeft1 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'left1'],
        //             ])
        //                 ->get();
        //     $adsTopRight1 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'topRight1'],
        //             ])
        //             ->get();
        //     $adsBottomRight1 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'bottomRight1'],
        //             ])
        //                 ->get();
        //     return response()->json(array(
        //         'adsMiddle1' => $adsMiddle1,
        //         'adsLeft1' => $adsLeft1,
        //         'adsTopRight1' => $adsTopRight1,
        //         'adsBottomRight1' => $adsBottomRight1,
        //         ));
        // }
        // elseif($set_template == 2){
        //     $adsLeft2 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'left2'],
        //             ])
        //                 ->get();
        //     $adsTopRight2 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'topRight2'],
        //             ])
        //             ->get();
        //     $adsBottomRight2 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'bottomRight2'],
        //             ])
        //                 ->get();
        //     return response()->json(array(
        //         'adsLeft2' => $adsLeft2,
        //         'adsTopRight2' => $adsTopRight2,
        //         'adsBottomRight2' => $adsBottomRight2,
        //         ));
        // }
        // elseif($set_template == 3){
        //     $adsMiddle3 = DB::table('ads')
        //             ->where([
        //                 ['template_id', '=', $set_template],
        //                 ['position', '=', 'middle3'],
        //             ])
        //                 ->get();
        //     return response()->json($adsMiddle3);
        // }
        // return response()->json(array(
        //     'adsMiddle1' => $adsMiddle1,
        //     'adsLeft1' => $adsLeft1,
        //     'adsTopRight1' => $adsTopRight1,
        //     'adsBottomRight1' => $adsBottomRight1,
        //     ));
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


