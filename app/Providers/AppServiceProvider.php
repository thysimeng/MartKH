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
        View::share('userData', User::all()->count());
        View::share('franchiseData', Franchise::all()->count());
        View::share('categoryData', Category::all()->count());
        View::share('productData', Product::all()->count());
        View::share('requestData', Request_Stock::where('status','pending')->count());
        // for no cache
        Cache::extend( 'none', function( $app ) {
            return Cache::repository( new NullStore );
        } );

    }
}
