<?php

namespace App\Http\Middleware;

use Closure;

class pengurusWilayah
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
        if(auth()->user()->level = 'pw') {
            return $next($request);
        }

        return redirect('/');
        // return $next($request);
    }
}
