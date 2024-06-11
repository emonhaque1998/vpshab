<?php

namespace App\Http\Middleware;

use App\Events\VisitorCount;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the visitor's IP address
        $ipAddress = $request->ip();

        VisitorCount::dispatch($ipAddress);

        return $next($request);
    }
}
