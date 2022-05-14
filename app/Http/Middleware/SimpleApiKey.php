<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimpleApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $headers = $request->header();

        if (isset($headers['x-api-key'])) {
            ($headers['x-api-key'][0] === env('X_API_KEY')) || abort(response()->json(['errors' => [(object) ['message' => 'Unauthorized']]], 401));
        } else {
            abort(response()->json(['errors' => [(object) ['message' => 'Unauthorized']]], 401));
        }

        return $next($request);
    }
}
