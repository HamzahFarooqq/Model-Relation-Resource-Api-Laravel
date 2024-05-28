<?php

namespace App\Http\Middleware;

use Closure;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExceptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);
        }
        catch(\Throwable $e)
        {
            return response()->json(['message'=> 'ye error try / catch sy araha hai jo ky Custom Exception Middleware hai.'], 404);
        }

    }
}
