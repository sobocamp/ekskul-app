<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PerformanceMonitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);
        $response = $next($request);
        $duration = (microtime(true) - $start) * 1000;

        if ($duration > config('alert.response_time_ms')) {
            Log::channel('custom')->warning('Slow response detected', [
                'url' => $request->path(),
                'time_ms' => $duration,
            ]);
        }

        return $response;
    }
}
