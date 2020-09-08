<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            $user = Auth::user();
            if ($user->role->name != 'superadmin' ) {
                return redirect()->route('administration.dashboard')->with('danger', 'Action non autorisée');
            }
            return $next($request);
        }
    }
}
