<?php

namespace App\Http\Middleware;

use Closure;

class SantriMiddleware
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
        if (auth()->guard('admins')->check() && auth()->guard('admins')->user()->role_id == 2) {
            return $next($request);
        }

        return redirect()->back()->withErrors('Hanya santri yang dapat mengakses halaman tersebut.');
    }
}
