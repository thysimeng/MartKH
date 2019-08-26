<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class StockController extends Controller
{
    public function index()
    {   
        // $stocks = Stock::query()->paginate(10);
        $stocks= Stock::leftJoin('products','products.pid','=','stocks.product_id')->paginate(10);
        $stocks_franch= Stock::leftJoin('franchises','franchises.id','=','stocks.franchise_id')->paginate(10);
        $data = [
            'stocks_data'=>$stocks,
            'stocks_franch_data'=>$stocks_franch,
            'queryParams' => [],
        ];
        return view('admin.stock.index')->with($data);
    }

    public function stockSearch(Request $request)
    {
        $search = $request->get('stock-search');
        $stocks= Stock::leftJoin('products','products.pid','=','stocks.product_id')->where('products.name', 'like', '%' .$search. '%')->paginate(10);
        $stocks_franch= Stock::leftJoin('franchises','franchises.id','=','stocks.franchise_id')->paginate(10);
        $data = [
            'stocks_data'=>$stocks,
            'stocks_franch_data'=>$stocks_franch,
            'queryParams' => [],
        ];
        return view('admin.stock.index')->with($data);
    }

    public function autocomplete(Request $request)
    {
        $data = DB::table('products')->where("name","LIKE","%{$request->input('query')}%")->get();
        // dd($data);
        return response()->json($data);
    }

    public function autocompleteFranchise(Request $request)
    {
        $data_franchise = DB::table('franchises')->select('id as fid', 'franchise_name as name')->where("franchise_name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data_franchise);
        
    }

    public function create(Request $request)
    {
        $product_id = $request->post('product_id');
        $franchise_id = $request->post('franchise_id');
        $amount = $request->post('amount');
        $data_stock = array(
            'product_id' => $product_id,
            'franchise_id' => $franchise_id,
            'amount' => $amount,
        );
        DB::table('stocks')->insert($data_stock);
        return redirect(route('admin.stock'));
    }

    public function delete(Request $request) {
        $stock_id = $request->post('delete_stock_id');
        DB::delete('delete from stocks where stid = ?',[$stock_id]);
        return redirect(route('admin.stock'));
    }

    public function edit(Request $request) {

        $stock_id = $request->post('stock_id');
        $old_amount = DB::table('stocks')->where("stid","=",$stock_id)->get();
        foreach ($old_amount as $id){
            $stid = $id->amount;
        }
        $new_amount = $request->post('new-amount');
        $new_st = $stid+$new_amount;
        Stock::where('stid', $stock_id)->update([
            'amount'=>$new_st,       
        ]);
        return redirect(route('admin.stock'));
     }
}
