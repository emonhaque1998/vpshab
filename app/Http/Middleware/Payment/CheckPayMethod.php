<?php

namespace App\Http\Middleware\Payment;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPayMethod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->payMethod === "all"){
            return response("Please select your payment method");
        }

        if($request->payMethod === "fund"){
            return response("Please select your payment method");
        }


        return $next($request);
    }
}
