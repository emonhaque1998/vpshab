<?php

namespace App\Http\Middleware\Payment;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuccessPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = session("paymentData");
        if(!$data){
            return redirect("/");
        }

        return $next($request);
    }
}
