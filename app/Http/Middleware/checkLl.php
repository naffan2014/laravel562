<?php

namespace App\Http\Middleware;

use Closure;

class checkLl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $ll)
    {
        var_dump($ll);
        return $next($request);
    }
}
