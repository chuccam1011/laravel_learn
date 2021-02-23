<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $allowsRoles = explode('|', $roles);
        if (in_array(Auth::user()->getStrType(), $allowsRoles)) {
            return $next($request);

        }
        return redirect()->route('403');
    }
}
