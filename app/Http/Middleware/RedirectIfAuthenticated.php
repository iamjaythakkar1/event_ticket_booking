<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin') {
                    // Redirect to admin's dashboard
                    return redirect(RouteServiceProvider::ADMIN_HOME);
                } elseif ($guard == 'organiser') {
                    // Redirect to organiser's dashboard
                    return redirect(RouteServiceProvider::ORGANISER_HOME);
                }

                // User's home page
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
