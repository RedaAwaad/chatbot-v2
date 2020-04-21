<?php

namespace App\Http\Middleware;

use Closure;

class CORS
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response->header('Access-Control-Allow-Origin','*');
    }
}
