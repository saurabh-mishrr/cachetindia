<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            /*$role = Auth::user()->memberof;
            switch ($role) {
                case 'CN=Administrators,CN=Builtin,DC=CACHETINDIA,DC=COM':
                    return redirect()->route('home');
                    break;
                case 'CN=ACCOUNTS,OU=Accounts,OU=Head Office,DC=CACHETINDIA,DC=COM':
                    return redirect()->route('salary.create');
                    break;
                default:
                    return redirect('login');
                    break;
            }*/
        }

        return $next($request);
    }
}
