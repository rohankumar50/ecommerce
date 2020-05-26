<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;

class CustomMiddleware
{

    public function handle($request, Closure $next)
    {
        $path=$request->path();
        if(!session()->has('user') && ($path=='admin')){
            return redirect('http://localhost/myecommerce/public/');
        }elseif(session()->has('user')&&($path=='login'||$path=='register')){
            return redirect('http://localhost/myecommerce/public/');
        }
        return $next($request);
    }
}
