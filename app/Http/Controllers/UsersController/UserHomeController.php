<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ads;
use DB;
use Auth;
use App\Models\WishList;
use App\Models\Product;

class UserHomeController extends Controller
{
    public function index(){
        $productPopular = DB::table('products')->limit(9)->get();
        $ads = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'middle1'],
                ])
                    ->get();
                    // dd($ads);
        return view('users.userHomePage', compact('productPopular', 'ads'));
    }

    public function get(Request $request)
    {
        $posts = User::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function wishList(Request $request){
        if (!Auth::user()){
            return view('auth.login');
        }
        $user_id=auth::user()->id;
        $insert=true;
        $product_id = $request->post('product_id');
        date_default_timezone_set('asia/phnom_penh');
        $old_pro_id = WishList::where('user_id', $user_id)->pluck('wishlist_id');
        foreach ($old_pro_id as $id){
            if ($id == $product_id){
                $insert=false;
            }
        }
        if ($insert == true){
            DB::table('wishlists')->insert([
                'user_id' => $user_id,
                'wishlist_id' => $product_id,
                'created_at'=>date("YmdHis"),
            ]);
            return redirect()->back()->with('success', 'product has been added to wishlist.');
        }
        else {
            return redirect()->back()->with('success', 'You already added this product.');
        }
    }

    public function wishListIndex(){
        $data_product = [];
        $user_id=auth::user()->id;
        $wishlish_pro_id = WishList::where('user_id', $user_id)->pluck('wishlist_id');
        foreach ($wishlish_pro_id as $id){
            $product = Product::find($id);
            array_push($data_product, $product);
        }
        // dd($data_product);
        return view('users.contents.wishlist')->with(compact('data_product'));
    }

    public function deleteWishList(Request $request) {
        $pro_id = $request->post('product_id');
        DB::delete('delete from wishlists where wishlist_id = ?',[$pro_id]);
        return redirect(route('add-wishlist'));
    }
}
