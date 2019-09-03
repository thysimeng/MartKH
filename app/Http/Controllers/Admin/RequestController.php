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
        $notifications = RequestNotification::paginate(10);
        $data = [
            'notifications_data'=>$notifications,
            'queryParams' => [],
        ];
        return view('admin.requests.index')->with($data);
    }

    public function edit(Request $request) {

        $request_id = $request->post('id');
        $status = $request->post('status');
        RequestNotification::where('id', $request_id)->update([
            'status'=>$status, 
            'updated_at'=>date("YmdHis"),      
        ]);
        return redirect(route('admin.requests.index'));
     }
}