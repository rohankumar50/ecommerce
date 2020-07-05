<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Route;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;


class adminmiddleware
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
        $id=Session::get('id');
        if($id==1)
        {
            return redirect('http://localhost/myecommerce/public/');
        }
        return $next($request);
    }
}
