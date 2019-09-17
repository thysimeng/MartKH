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
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Alert;
use File;
use Image;

class UserHomeController extends Controller
{
    public function index(){
        $productPopular = DB::table('products')->limit(9)->get();
        $adsMiddle1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'middle1'],
                ])
                    ->get();
        $adsLeft1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'left1'],
                ])
                    ->get();
        $adsTopRight1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'topRight1'],
                ])
                ->get();
        $adsBottomRight1 = DB::table('ads')
                ->where([
                    ['template_id', '=', '1'],
                    ['position', '=', 'bottomRight1'],
                ])
                    ->get();

        $adsLeft2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'left2'],
                ])
                    ->get();
        $adsTopRight2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'topRight2'],
                ])
                ->get();
        $adsBottomRight2 = DB::table('ads')
                ->where([
                    ['template_id', '=', '2'],
                    ['position', '=', 'bottomRight2'],
                ])
                    ->get();
        $adsMiddle3 = DB::table('ads')
        ->where([
            ['template_id', '=', '3'],
            ['position', '=', 'middle3'],
        ])
            ->get();
                    // dd($ads);
        return view('users.userHomePage', compact('productPopular', 'adsLeft1','adsMiddle1','adsTopRight1','adsBottomRight1','adsLeft2','adsTopRight2','adsBottomRight2','adsMiddle3'));
    }

    // public function get(Request $request)
    // {
    //     $posts = User::orderBy('created_at', 'desc')->get();
    //     return response()->json($posts);
    // }

    public function wishList(Request $request){
        if (!Auth::user()){
            return view('auth.login');
        }
        $user_id=auth::user()->id;
        $insert=true;
        $product_id = $request->productID;
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
            // return redirect()->back()->with('success', 'product has been added to wishlist.');
            return response()->json($insert);
        }
        else {
            // return redirect()->back()->with('success', 'You already added this product.');
            DB::table('wishlists')->where('wishlist_id', '=', $product_id)->delete();
            return response()->json($insert);
        }
        // $product_id = $request->productID;
        // return response()->json($product_id);
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
        return view('users.wishlist')->with(compact('data_product'));
    }

    public function wishlistdisplay(){
        $user_id=auth::user()->id;
        $wishlist = DB::table('wishlists')
        ->join('products', 'wishlists.wishlist_id', '=', 'products.id')
        ->where('wishlists.user_id', '=', $user_id)
        ->select('products.*')
        ->get();
        // $wishlist = WishList::all();
        return response()->json($wishlist);
    }

    public function deleteWishList(Request $request) {
        $pro_id = $request->post('product_id');
        DB::delete('delete from wishlists where wishlist_id = ?',[$pro_id]);
        return redirect(route('add-wishlist'));
    }

    // User Profile
    public function userProfile()
    {
        if (session('status'))
        {
            Alert::success('Success', session('status'));
        }
        if (session('password_status'))
        {
            Alert::success('Success', session('password_status'));
        }

        return view('users.userProfile');
    }

    public function updateUserProfile(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function updateUserPassword(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function upload(Request $request)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048|'
        ]);

        if($request->hasFile('avatar'))
        {
            $user = Auth::user();
            if($user->avatar != 'default.png')
            {
                $userImage = public_path('uploads\avatar\\'.$user->avatar);
                if(file_exists($userImage))
                {
                    File::delete($userImage);
                }
            }
            $avatar = $request->file('avatar');
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(400,400)->save( public_path('uploads\avatar\\'.$fileName));

            $user->avatar = $fileName;
            $user->save();

            return back()->withStatus(__('Profile picture successfully updated.'));
        }
    }

}
