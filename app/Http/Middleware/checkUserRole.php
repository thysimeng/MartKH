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
        if($request->user()->role != 'admin'){
            // if user is not admin, redirect them to the frontend page
            return redirect()->route('normalUser');
        }
        return $next($request);
    }
}
