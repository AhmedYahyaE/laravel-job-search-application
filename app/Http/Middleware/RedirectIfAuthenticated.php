<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME); // For solving the error that shows up when assigning the 'guest' middleware to routes (because the 'guest' middleware, by default, redirects to a route/URL which is '/home' and not your typically used '/' route/URL that you typically use for denoting Home Pages), Check app\Providers\RouteServiceProvider.php file     AND     check 3:49:42 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            }
        }

        return $next($request);
    }
}
