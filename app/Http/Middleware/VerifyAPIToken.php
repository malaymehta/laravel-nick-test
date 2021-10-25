<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAPIToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('secretKey')) {
            $response = [
                'status' => 401,
                'message' => 'You are not Authorized for this api please use secretKey on header to receive success call.',
            ];
        }
        if ($request->header('secretKey') != config('app.api_header_secret_key')) {
            $response = [
                'status' => 401,
                'message' => 'Invalid secretKey'
            ];
        }
        if (isset($response)) {
            return response()->json($response);
        }
        return $next($request);
    }
}
