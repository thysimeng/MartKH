<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

// for no cache
use Illuminate\Cache\NullStore;
use Cache;
use View;
use App\Customize;
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
        // for no cache
        Cache::extend( 'none', function( $app ) {
            return Cache::repository( new NullStore );
        } );

    }
}
