<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Stock_Franchise;
use DB;

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
}
