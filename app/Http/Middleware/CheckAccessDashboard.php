<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccessDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check())
            if (auth()->user()->accessDashboard())
                return $next($request);
        return redirect(route('website.home'));
    }
}
