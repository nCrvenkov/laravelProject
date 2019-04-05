<?php

namespace App\Http\Middleware;

use Closure;

class checkAuth
{
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('user')){
            return redirect("/index")->with('poruka','Ne možete pristupiti ovoj stranici!');
        } else {
            return $next($request);
        }
    }
}
