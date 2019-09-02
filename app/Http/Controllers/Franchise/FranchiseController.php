<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Stock_Franchise;
use DB;
use Auth;
use Image;
use Alert;
use File;

class FranchiseController extends Controller
{
    // "Resources" generated functions are for Franchise Stock

    public function showDashboard()
    {
        $franchise_user = auth()->user();
        $current_franchise = DB::table('franchise_user')
                                ->join('franchises','franchise_user.franchise_id','=','franchises.id')
                                ->join('users','franchise_user.user_id','=','users.id')
                                ->select('franchises.*')
                                ->where('users.id','=',$franchise_user->id)
                                ->first();
        return view('franchise.dashboard',compact('franchise_user','current_franchise'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_fran = Stock_Franchise::paginate(10);
        return view('franchise.index',compact('stock_fran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // request stock from admin
    public function requestForm()
    {
        return view('franchise.requestStock');
    }

    public function requestStock()
    {
        // 
    }

    // View Product Only
    public function viewProduct()
    {
        $products = Products::paginate(10);
        return view('franchise.product',compact('products'));
    }

    // Edit Profile
    public function editProfile()
    {
        if (session('status'))
        {
            Alert::success('Success', session('status'));
        }
        if (session('password_status'))
        {
            Alert::success('Success', session('password_status'));
        }

        return view('franchise.editProfile');
    }

    public function updateProfile(Request $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request)
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
