<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Auth;

class checkUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if user is not admin, redirect them to the their respective pages
        if($request->user()->role == 'user'){
            return redirect()->route('normalUser');
        }
        elseif($request->user()->role == 'franchise'){
            return redirect()->route('franchise');
        }
        return $next($request);
    }
}
