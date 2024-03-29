<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

// for no cache
use Illuminate\Cache\NullStore;
use Cache;
use App\Customize;
use App\Models\Product;
use App\Franchise;
use App\Models\Category;
use App\User;
use App\Request_Stock;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $sidebar = Customize::where('name','sidebar')->first();
        $sidebarValue = $sidebar->data;
        View::share('sidebar', $sidebarValue);
        $basicColor = Customize::where('name','basicColor')->first();
        $basicColorValue = $basicColor->data;
        View::share('basicColor', $basicColorValue);
        $logo = Customize::where('name','logo')->first();
        $logoName = $logo->data;
        View::share('logo', $logoName);
        $gradientColor = Customize::where('name','gradientColor')->first();
        $gradientColorValue = $gradientColor->data;
        View::share('gradientColor', $gradientColorValue);
        // Dashboard
        $current_month = date('m');
        $current_year = date('y');
        View::share('userData', User::all()->count());
        View::share('userDataCurrentMonth', DB::table("users")->whereBetween('created_at',["$current_year-$current_month-1","$current_year-$current_month-31"])->count());

        View::share('franchiseData', Franchise::all()->count());
        View::share('franchiseDataCurrentMonth', DB::table("franchises")->whereBetween('created_at',["$current_year-$current_month-1","$current_year-$current_month-31"])->count());

        View::share('categoryData', Category::all()->count());
        View::share('categoryDataCurrentMonth', DB::table("categories")->whereBetween('created_at',["$current_year-$current_month-1","$current_year-$current_month-31"])->count());

        View::share('productData', Product::all()->count());
        View::share('productDataCurrentMonth', DB::table("products")->whereBetween('created_at',["$current_year-$current_month-1","$current_year-$current_month-31"])->count());

        View::share('requestData', Request_Stock::where('status','pending')->count());
        // for no cache
        Cache::extend( 'none', function( $app ) {
            return Cache::repository( new NullStore );
        } );
    }
}
