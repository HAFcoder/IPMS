<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCoordinator
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
        if(auth()->check() && auth()->user()-> role == 'coordinator'){
            return $next($request);
        }
        elseif(auth()->check() && auth()->user()-> status == 'approve'){
            return $next($request);
        }
        return redirect('home/pending')->with('error',"Only authorized user can access!");
    }
}
