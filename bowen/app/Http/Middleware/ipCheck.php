<?php

namespace App\Http\Middleware;

use App\models\Administrator;
use Closure;

class ipCheck
{
    public function handle($request, Closure $next)
    {
        $ipaddress = new Administrator();
        $ipaddress->insertIp($request->ip());

        return $next($request);
    }
}
