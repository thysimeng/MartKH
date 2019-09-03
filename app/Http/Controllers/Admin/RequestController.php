<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Franchise;
use App\Models\RequestNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Validator;

class RequestController extends Controller
{
    public function index()
    {   
        $notifications = RequestNotification::where('status',0)->paginate(10);
        $data = [
            'notifications_data'=>$notifications,
            'queryParams' => [],
        ];
        return view('admin.requests.index')->with($data);
    }

    public function edit(Request $request) {

        $request_id = $request->post('id');
        $status = $request->post('status');
        return RequestNotification::where('id', $request_id)->update([
            'status'=>$status, 
            'updated_at'=>date("YmdHis"),      
        ]);
        
     }

    // public function search(Request $request){
    //     $search = $request->get('search');
    //     $notifications = RequestNotification::whereHas('franchise', function ($query) use ($search){
    //         $query->where('franchise_name', 'like', '%'.$search.'%');
    //     })
    //     ->with(['franchise' => function($query) use ($search){
    //         $query->where('franchise_name', 'like', '%'.$search.'%');
    //     }])->get();

    //     $data = [
    //         'notifications_data'=>$notifications,
    //         'queryParams' => [],
    //     ];
    //     return view('admin.requests.index')->with($data);
    // }

    public function ApprovedRequest()
    {   
        $notifications = RequestNotification::where('status',1)->paginate(10);
        $data = [
            'notifications_data'=>$notifications,
            'queryParams' => [],
        ];
        return view('admin.requests.approved')->with($data);
    }
}