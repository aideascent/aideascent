<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if($request->session()->has('customer_id')) { // customer_id is not a field in the customers table. It is just used to avoid conflict with the admin id. 
            return $next($request);
        }        
        return redirect()->route('customer.login');
    }
}
