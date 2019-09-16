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
    // Status Key Words in DB: pending, approved, declined
    public function index()
    {   
        $notifications = RequestNotification::where('status','pending')->paginate(10);
        $allNotifications = RequestNotification::where('status','pending')->get();
        $data = [
            'notifications_data'=>$notifications,
            'allNotifications_data'=>$allNotifications,
            'queryParams' => [],
        ];
        return view('admin.requests.index')->with($data);
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
        $notifications = RequestNotification::where('status','approved')->paginate(10);
        $allNotifications = RequestNotification::where('status','approved')->get();
        $data = [
            'notifications_data'=>$notifications,
            'allNotifications_data'=>$allNotifications,
            'queryParams' => [],
        ];
        return view('admin.requests.approved')->with($data);
    }
}