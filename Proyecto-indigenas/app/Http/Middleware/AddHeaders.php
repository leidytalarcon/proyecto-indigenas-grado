<?php

namespace App\Http\Middleware;

use Closure;

class AddHeaders
{
    public function handle($request, Closure $next)
    {
        $jwt_token = $request->cookie('JWT');
     
        if ( ! $jwt_token) {
            return $next($request);
        }

        $request->headers->set('Authorization', "Bearer {$jwt_token}");
 
        return $next($request);
    }
}