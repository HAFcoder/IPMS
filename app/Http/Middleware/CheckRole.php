<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        $role = strtolower( request()->user()->role );
        $allowed_roles = array_slice(func_get_args(), 2);
    
        if ( in_array($role, $allowed_roles) ) {
            return $next($request);
        } 
        return redirect('/');
    }
}
