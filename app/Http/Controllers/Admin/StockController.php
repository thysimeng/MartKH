<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Stock_Log;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class StockController extends Controller
{
    public function index()
    {   
        $stocks = Stock::paginate(10);
        $allStocks = Stock::get();
        $data = [
            'stocks_data'=>$stocks,
            'allStocks_data'=>$allStocks,
            'queryParams' => [],
        ];
        return view('admin.stock.index')->with($data);
    }

    public function stockSearch(Request $request)
    {
        $search = $request->get('search');
        $stocks= Stock::whereHas('product', function($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('enter_by','like','%'.$search.'%');
       })->paginate(10);
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

    // public function autocompleteFranchise(Request $request)
    // {
    //     $data_franchise = DB::table('franchises')->select('id', 'franchise_name as name')->where("franchise_name","LIKE","%{$request->input('query')}%")->get();
    //     return response()->json($data_franchise);
        
    // }

    public function create(Request $request)
    {
        $product_id = $request->post('product_id');
        $amount = $request->post('amount');
        date_default_timezone_set('asia/phnom_penh');
        $stock = Stock::where('product_id',$product_id)->get();
        $old_amount = 0;
        if ($stock != null)
        {
            foreach ($stock as $row)
            {
                $old_amount = $row->amount;
            }
        }
        $stock_log = new Stock_Log;
        $stock_log->old_amount = $old_amount;
        $stock_log->product_id = $product_id;
        $stock_log->edited_by = auth()->user()->name;
        $stock_log->reason = 'Stock Addition';
        $stock_log->type = 'Creation';

        $amount = $amount + $old_amount;
        $stock_log->new_amount = $amount;
        $stock_log->save();
        
        DB::table('stocks')->updateOrInsert(
            ['product_id' => $product_id],
            ['amount' => $amount, 'created_at'=>date("YmdHis"), 'enter_by' => $request->post('enter_by'),]
        );
        return redirect(route('admin.stock'));
    }

    public function delete(Request $request) {
        $stock_id = $request->post('delete_stock_id');
        DB::delete('delete from stocks where id = ?',[$stock_id]);
        return redirect(route('admin.stock'));
    }

    public function edit(Request $request) {

        $stock_id = $request->post('stock_id');
        $stock = DB::table('stocks')->where("id","=",$stock_id)->get();
        foreach ($stock as $id){
            $old_amount = $id->amount;
            $product_id = $id->product_id;
        }
        $stock_log = new Stock_Log;
        $stock_log->old_amount = $old_amount;
        $stock_log->product_id = $product_id;
        $stock_log->edited_by = auth()->user()->name;
        $stock_log->reason = $request->post('reason');
        $stock_log->type = 'Edition';

        date_default_timezone_set('asia/phnom_penh');
        $new_amount = $request->post('new-amount');
        $stock_log->new_amount = $new_amount;
        $stock_log->save();
        Stock::where('id', $stock_id)->update([
            'amount'=>$new_amount, 
            'updated_at'=>date("YmdHis"),      
        ]);
        return redirect(route('admin.stock'));
    }

    // View Franchise Stock

    public function viewFranchiseStock()
    {
        $stock_franchises = DB::table('stock_franchise as sf')
                                ->join('products as p','sf.product_id','=','p.id')
                                ->join('franchises as f','sf.franchise_id','=','f.id')
                                ->select('sf.*','sf.created_at as sf_created','sf.id as sfid','p.*','f.*')
                                ->paginate(10);
        return view('admin.stock.stockFranchise',compact('stock_franchises'));
    }

    public function franchiseStockSearch(Request $request)
    {
        $search = $request->get('search');
        
        $stock_franchises = DB::table('stock_franchise as sf')
                                ->join('products as p','sf.product_id','=','p.id')
                                ->join('franchises as f','sf.franchise_id','=','f.id')
                                ->where(function($query) use ($search){
                                    $query->where('p.name','like','%'.$search.'%')
                                    ->orWhere('p.code','like','%'.$search.'%')
                                    ->orWhere('f.franchise_name','like','%'.$search.'%');
                                })
                                ->select('sf.*','sf.created_at as sf_created','sf.id as sfid','p.*','f.*')
                                ->paginate(10);
                                // dd($stock_franchises);
        return view('admin.stock.stockFranchise',compact('stock_franchises'));
    }

    public function log()
    {
        $stock_log = Stock_Log::paginate(10);

        return view('admin.stock.log',compact('stock_log'));
    }

    public function logSearch(Request $request)
    {
        $search = $request->get('search');

        $stock_log = Stock_Log::whereHas('product',function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            })
            ->orWhere('reason','like','%'.$search.'%')
            ->orWhere('type','like','%'.$search.'%')
            ->orWhere('edited_by','like','%'.$search.'%')
            ->paginate(10);

        return view('admin.stock.log',compact('stock_log'));
    }
}
