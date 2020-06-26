<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Products;
use DB;
use auth;
use Config;
use Session;
use Alert;
use App\Customize;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\WishList;


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
    // public function wishlistproducts()
    // {
    //     // if (!Auth::user()){
    //     //     return view('auth.login');
    //     // }
    //     // else
    //     // {
    //     //     $user_id=auth::user()->id;
    //     // }
    //     // $food = DB::table('wishlists')->where('user_id', '=', $user_id)->get();
    //     $user_id=auth::user()->id;
    //     $food = DB::table('wishlists')->where('user_id','=', $user_id)->get();
    //     return response()->json($food);
    // }
    // public function wishlistproducts()
    // {
    //     // if (!Auth::user()){
    //     //     return view('auth.login');
    //     // }
    //     // else
    //     // {
    //     //     $user_id=auth::user()->id;
    //     // }
    //     // $food = DB::table('wishlists')->where('user_id', '=', $user_id)->get();
    //     $user_id=auth::user()->id;
    //     $food = DB::table('wishlists')->where('user_id','=', $user_id)->get();
    //     return response()->json($food);
    // }
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

    // using session
    // public function adsID(Request $request){
    //     $template_id = $request->template_id;
    //     if($template_id == '1'){
    //         session()->put('template_id', 1);
    //         $set_template = session()->get('template_id');
    //     }elseif($template_id == '2'){
    //         session()->put('template_id', 2);
    //         $set_template = session()->get('template_id');
    //     }
    //     elseif($template_id == '3'){
    //         session()->put('template_id', 3);
    //         $set_template = session()->get('template_id');
    //     }
    //     Alert::success('Update Template', 'Successfully Updated');
    //     return response()->json($set_template);
    // }

    // using data table
    public function adsID(Request $request){
        $template_id = $request->template_id;
        if($template_id == '1'){
            DB::table('customize')
            ->where('id', 1)
            ->update(['data' => '1']);
        }
        elseif($template_id == '2'){
            DB::table('customize')
            ->where('id', 1)
            ->update(['data' => '2']);
        }
        elseif($template_id == '3'){
            DB::table('customize')
            ->where('id', 1)
            ->update(['data' => '3']);
        }
        Alert::success('Update Template', 'Successfully Updated');
        return redirect()->route('ads.index');
    }

    // set Template using session
    // public function setTemplateID(){
    //     // if(session()->get('template_id') === NULL){
    //     //     return 3;
    //     // }else{
    //         $set_template = session()->get('template_id');
    //         return response()->json($set_template);
    //     // }
    // }

    //set template using data table
    public function setTemplateID(){
        $set_template = DB::table('customize')
                        ->where('id',1)
                        ->first();
        $set_template_data = $set_template->data;
        return response()->json($set_template_data);
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

    // start update section/////////////////////////////////////////////////////////////////////

    public function allProduct()
    {
        $product = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->Paginate(12);
        // dd($product);
        return json_encode($product);
    }
    public function ProductByCategory($category)
    {
        $products = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->where('categories_name', $category)
        ->select('products.*', 'categories.categories_name')
        ->take(8)->get();
        return json_encode($products);
    }
    public function authCkecker(){
        // $data = $request->all();
        return json_encode(FacadesAuth::check());
    }
    public function requestTester(Request $request){
    // public function requestTester(){
        $data = $request->all();
        return json_encode($data);
    }

    public function authToken(Request $request){
        return json_encode($request->session()->token());
    }

    // fetch wishlist product
    public function wishlistproducts()
    {
        $data_product = [];
        if(Auth::check()){
            $user_id=auth::user()->id;
            $wishlish_pro_id = WishList::where('user_id', $user_id)->pluck('wishlist_id');
            foreach ($wishlish_pro_id as $id){
                $product = Products::find($id);
                array_push($data_product, $product);
            }
        }
        else {
            $data_product;
        }
        return response()->json($data_product);
    }

    //retriev for filter by price
    public function filterByPrice($min_max){
        $min_max_array = explode(', ', $min_max);
        $min_price = $min_max_array[0];
        $max_price = $min_max_array[1];

        $products = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->where('products.price','>=', $min_price)
        ->where('products.price','<=', $max_price)
        ->Paginate(12);
        return json_encode($products);
    }

    //retriev for filter by search
    public function filtersBySearch($search){
        $search;
        if($search=='all'){
            $products = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.categories_name')
            ->Paginate(12);
            // dd($product);
            return json_encode($products);
        }
        else{
            $products = DB::table('products')
            ->where('name','LIKE', '%' . $search . '%')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.categories_name')
            ->Paginate(12);
            return json_encode($products);
        }
    }

    //retrieve categories name
    public function categoriesName(){
        // $categories = DB::table('categories')->take(5)->get();
        $categories = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->select(DB::raw("*,count(categories_name) as count"))
        ->groupBy('categories.categories_name')
        // ->select('*')
        // ->where('categories.categories_name', $category)
        ->take(5)->get();
        return json_encode($categories);
    }

    //retrieve for categories data by name countCategories
    public function getCategoriesByName($category){
        if($category=='all'){
            $products = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.categories_name', 'subcategories.subcategory_name')
            ->Paginate(12);
        }
        else{
            $products = DB::table('products')
            ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.categories_name', 'subcategories.subcategory_name')
            ->where('categories.categories_name', $category)
            ->orWhere('subcategories.subcategory_name', $category)
            ->Paginate(12);
        }
        return json_encode($products);
    }

    //retrieve for ads Template ID for slide view
    public function getAdsTemplateID(){
        $id = DB::table('customize')
        ->where('name', 'adsTemplate')
        ->get();
        return json_encode($id);
    }
    //retrieve for ads Template data
    public function getADSData(){
        $id = DB::table('customize')
        ->where('name', 'adsTemplate')
        ->get();
        if($id[0]->data==1){
            $left = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','left1')
            ->get();
            $dataCorrect['left']=$left;

            $middle = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','middle1')
            ->get();
            $dataCorrect['middle']=$middle;

            $topRight = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','topRight1')
            ->get();
            $dataCorrect['topRight']=$topRight;

            $bottomRight = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','bottomRight1')
            ->get();
            $dataCorrect['bottomRight']=$bottomRight;

        }
        else if($id[0]->data==2){
            $left = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','left2')
            ->get();
            $dataCorrect['left']=$left;

            $topRight = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','topRight2')
            ->get();
            $dataCorrect['topRight']=$topRight;

            $bottomRight = DB::table('ads')
            ->where('template_id',$id[0]->data)
            ->where('position','bottomRight2')
            ->get();
            $dataCorrect['bottomRight']=$bottomRight;

        }
        else if($id[0]->data==3){
            $dataCorrect = DB::table('ads')->where('template_id',$id[0]->data)->get();
        }
        // $dataCorrect['position']='b';
        // $dataCorrect['position']=$data;
        return json_encode($dataCorrect);
    }

    public function getSubCategories(){
        // $categories = DB::table('categories')->take(5)->get();
        $sub_category = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.categories_name')
        ->select(DB::raw("*,count(categories_name) as count"))
        ->groupBy('subcategories.subcategory_name')
        // ->select('*')
        // ->where('categories.categories_name', $category)
        ->get();
        // $sub_category = DB::table('subcategories')->get();
        return json_encode($sub_category);
    }
}


