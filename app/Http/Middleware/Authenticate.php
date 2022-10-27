<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login'); // You must have a 'Named Routes' in your web.php file (using name() method on the '/login' route)    // For solving the error that shows up when assigning the 'auth' middleware to routes (because of not using 'Named Routes' and the name() method on the route itself), check 3:47:50 in https://www.youtube.com/watch?v=MYyJ4PuL4pY     AND     Check Named Routes: https://laravel.com/docs/9.x/routing#named-routes
        }
    }
}
