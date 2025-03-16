<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RouteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $RouteRole): Response
    {
        if(Auth::check()){
            if(RouteMiddleware::class == $RouteRole){
                return $next($request);
            }
            abort(403);
        }

        abort(401);
        
    }
}
