<?php
// THIS MIDDLEWARE MUST BE REGISTERED IN THE Kernel FILE IN THE $routeMiddleware SECTION

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccessDashboardMiddleware
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
        // USING isAdmin METHOD FROM User MODEL
        if(Auth::user()->isAdmin()){
            return $next($request);
        }
        // REDIRECTS THE USER TO THE WELCOME PAGE IF IT IS NOT ADMIN
        return redirect("/");
    }
}
