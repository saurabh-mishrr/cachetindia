<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
            if (!$request->secure() && App::environment() === 'production') {
                //echo $request->getRequestUri();
                //exit;
                $reqUrl=$request->getRequestUri();
                $reqUrl=str_replace('/index.php','',$reqUrl);
                //echo $reqUrl;
                //exit;
                //return redirect()->secure($request->getRequestUri());
                return redirect()->secure($reqUrl);
            }

            return $next($request); 
    }
}