<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user->user_type == "marketing") {
            return response()->json(["forbidden."], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
