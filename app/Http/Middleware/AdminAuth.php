<?php

namespace theGrocer\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuth
{

    public function handle($request, Closure $next, $guard = 'admins')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('admin/login');
            }
        }

        return $next($request);
    }
}
