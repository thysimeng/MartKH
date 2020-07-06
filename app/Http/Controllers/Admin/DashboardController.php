<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\User;
use Carbon;

class DashboardController extends Controller
{
    public function index(){
        // Chart Product
        $chartProductData = Product::select('id', 'created_at')
            ->whereYear('created_at','2019')
            ->get()
            ->groupBy(function($date) {
                return Carbon\Carbon::parse($date->created_at)->format('m');
            });
        $productCount = [];
        $chartProductCount = [];

        foreach ($chartProductData as $key => $value) {
            $productCount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++){
            if(!empty($productCount[$i])){
                $chartProductCount[$i] = $productCount[$i];    
            }
            else{
                $chartProductCount[$i] = 0;    
            }
        }

        // Chart User
        $chartUserData = User::select('id', 'created_at')
            ->whereYear('created_at','2019')
            ->get()
            ->groupBy(function($date) {
                return Carbon\Carbon::parse($date->created_at)->format('m');
            });
        $userCount = [];
        $chartUserCount = [];

        foreach ($chartUserData as $key => $value) {
            $userCount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++){
            if(!empty($userCount[$i])){
                $chartUserCount[$i] = $userCount[$i];
            }
            else{
                $chartUserCount[$i] = 0;
            }

        }

        $mostWishlisted = DB::table('wishlists')
            ->join('products','wishlist_id', '=', 'products.id')
            ->select('products.name as name', DB::raw('COUNT(wishlists.wishlist_id) as wishlistCount'))
            ->groupBy('wishlist_id')
            ->limit(5)
            ->orderBy('wishlistCount', 'desc')
            ->get();
        
        $newUsers = DB::table('users')
            ->where('role', '=', 'user')
            ->latest()
            ->limit(10)
            ->get();
        
        return view('admin.dashboard', compact('chartProductCount', 'chartUserCount', 'mostWishlisted', 'newUsers'));
    }
}
