<?php

namespace App\Http\Middleware;

class CostomMiddleware {

    public function handle($request, $next) {

        return $next($request);
        
    }

}