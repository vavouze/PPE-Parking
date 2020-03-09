<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class LogAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */


    public function handle($request, Closure $next)
    {
        $session = session('id');

        if ($session === null) {

            return redirect('/');
        }
        return $next($request);
    }
}
