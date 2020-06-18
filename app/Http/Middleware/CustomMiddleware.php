<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Routing\Route;

class CustomMiddleware
{

    public function handle($request, Closure $next)
    {
        $path=$request->path();
        if(!session()->has('user') &&($path=='admin'||$request->is('admin/*')))
        {
            return redirect('http://localhost/myecommerce/public/');
        }elseif(session()->has('user')&&($path=='login'||$path=='register')){
            return redirect('http://localhost/myecommerce/public/');
        }

        return $next($request);
    }
}
