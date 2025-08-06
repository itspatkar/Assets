<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "Middleware Initiated";

        // echo $request->age;

        // if ($request->age < 18) {
        //     echo "You're mot allow to access the page!";
        //     die();
        // }

        return $next($request);
    }
}
