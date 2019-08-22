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
        $stocks= Stock::leftJoin('products','products.pid','=','stocks.product_id')->where('name', 'like', '%' .$search. '%')->paginate(10);
        $data = [
            'stocks_data'=>$stocks,
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
        // $dataModified = array();
        // foreach ($data_franchise as $data)
        // {   
        //     $fid=$data->id;
        //     $dataModified[] = $data->franchise_name;
        //     $dataModified[] = $data=(string)$fid;
        // }

        // dd($data_franchise);

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

    // public function destroy($cid) {
    //     DB::delete('delete from categories where cid = ?',[$cid]);
    //     return redirect(route('admin.category'));
    // }

    // public function edit(Request $request) {

    //     $category_id = $request->post('category_id');
    //     $category_name = $request->post('category_name');

    //     Category::where('cid', $category_id)->update([
    //         'categories_name'=>$category_name,       
    //     ]);
    //     return redirect(route('admin.category'));
    //  }
}
