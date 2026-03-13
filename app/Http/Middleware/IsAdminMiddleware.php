<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // use the auth helper consistently and null-safe access
        if (! Auth()->check() || ! Auth()->user()?->is_admin) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
