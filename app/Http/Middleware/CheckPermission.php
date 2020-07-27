<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        /*$permission = explode('|', $permissions);
        if (checkPermission($permission)) {
            return $next($request);
        }*/
        return $next($request);
        //abort(403, 'Unauthorized.');
    }
}
