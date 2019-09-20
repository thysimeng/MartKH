<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Franchise;
use App\Request_Stock;
use App\Stock_Franchise;
use DB;
use Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class RequestController extends Controller
{
    // Status Key Words in DB: pending, approved, declined
    public function index()
    {   
        // $notifications = RequestNotification::where('status','pending')->paginate(10);
        // $allNotifications = RequestNotification::where('status','pending')->get();
        // $data = [
        //     'notifications_data'=>$notifications,
        //     'allNotifications_data'=>$allNotifications,
        //     'queryParams' => [],
        // ];
        // return view('admin.requests.index')->with($data);
        if (session('status'))
        {
            Alert::success('Success', session('status'));
        }
        if (session('error'))
        {
            Alert::error('Error', session('error'));
        }

        $requestStocks = Request_Stock::where('status','pending')->paginate(10);

        return view('admin.requests.index',compact('requestStocks'));
    }

    public function store(Request $request)
    {
        // 
    }

    public function edit(Request $request) {

        $request_id = $request->post('id');
        $status = $request->post('status');
        return RequestNotification::where('id', $request_id)->update([
            'status'=>$status, 
            'updated_at'=>date("YmdHis"),      
        ]);
        
    }

    public function approve($id)
    {
        $request_stock = Request_Stock::findOrFail($id);
        $stock = Stock::where('product_id','=',$request_stock->product_id)->first();
        $stock_franchise = Stock_Franchise::all();
        $franchiseStockExist = false;
        // dd($stock_franchise);
        // dd($stock);
        if($stock->amount < $request_stock->amount)
        {
            // dd($stock);
            return redirect()->route('admin.request')->withError(__('Main Stock Amount is less than the Requested Amount'));
        }
        elseif ($stock->amount > $request_stock->amount)
        {
            // dd($request_stock);
            // Stock side
            $amount = $stock->amount - $request_stock->amount;
            $stock->amount = $amount;

            // Franchise Side
            foreach($stock_franchise as $row)
            {
                if($request_stock->franchise_id == $row->franchise_id && $request_stock->product_id == $row->product_id)
                {
                    $franchiseStockExist = true;
                    break;
                }
                else
                {
                    $franchiseStockExist = false;
                }
            }
            if($franchiseStockExist)
            {
                $newAmount = $row->amount + $request_stock->amount;
                $match = ['franchise_id'=>$row->franchise_id, 'product_id'=>$row->product_id];
                // $newStock = Stock_Franchise::where(['franchise_id','=',$row->franchise_id],['product_id','=',$row->product_id])->first();
                $newStock = Stock_Franchise::where($match)->first();
                // dd($newStock);
                $newStock->amount = $newAmount;
                // $newStock->franchise_id = $request_stock->franchise_id;
                // $newStock->product_id = $request_stock->product_id;
                
                $newStock->save();
                $stock->save();
            }
            else
            {
                $newStock = new Stock_Franchise();
                $newStock->franchise_id = $request_stock->franchise_id;
                $newStock->product_id = $request_stock->product_id;
                $newStock->amount = $request_stock->amount;
                
                $newStock->save();
                $stock->save();
            }

            $request_stock->status = 'approved';
            $request_stock->save();
            return redirect()->route('admin.request')->withStatus(__('Successfully Approved.'));
        }
    }

    public function decline($id)
    {
        $request_stock = Request_Stock::findOrFail($id);
        $request_stock->status = 'declined';
        $request_stock->save();

        return redirect()->route('admin.request')->withStatus(__('Successfully Declined.'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $requestStocks = Request_Stock::whereHas('product',function($query) use ($search){
                $query->where([['status','pending'],['name','like','%'.$search.'%']]);
            })
            ->orWhereHas('franchise',function($query) use ($search){
                $query->where([['status','pending'],['franchise_name','like','%'.$search.'%']]);
            })
        ->paginate(10);
        
        return view('admin.requests.index',compact('requestStocks'));
    }

    public function requestHistory()
    {
        $requestStocks = Request_Stock::orderBy('created_at','desc')->paginate(10);

        return view('admin.stock.requestHistory',compact('requestStocks'));
    }

    public function requestHistorySearch(Request $request)
    {
        $search = $request->get('search');

        $requestStocks = Request_Stock::whereHas('product',function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            })
            ->orWhereHas('franchise',function($query) use ($search){
                $query->where('franchise_name','like','%'.$search.'%');
            })
            ->orWhere('status','like','%'.$search.'%')
            ->orderBy('created_at','desc')->paginate(10);

        return view('admin.stock.requestHistory',compact('requestStocks'));
    }

    // public function ApprovedRequest()
    // {   
    //     $notifications = RequestNotification::where('status','approved')->paginate(10);
    //     $allNotifications = RequestNotification::where('status','approved')->get();
    //     $data = [
    //         'notifications_data'=>$notifications,
    //         'allNotifications_data'=>$allNotifications,
    //         'queryParams' => [],
    //     ];
    //     return view('admin.requests.approved')->with($data);
    // }
}