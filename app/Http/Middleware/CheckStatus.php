<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $status = strtolower( request()->user()->status );
        $allowed_roles = array_slice(func_get_args(), 2);
    
        if ( in_array($status, $allowed_roles) ) {
            return $next($request);
        } 
        return redirect('/');

    }
}
