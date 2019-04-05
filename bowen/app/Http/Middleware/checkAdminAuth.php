<?php

namespace App\Http\Middleware;

use Closure;

class checkAdminAuth
{

    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('admin')){
            return redirect("/index")->with('poruka','Ne možete pristupiti ovoj stranici!');
        } else {
            return $next($request);
        }
    }
}
