<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PrivilegeControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if( $request->input('useraccess') !== 'total' )
        {
            return response('Tienes acceso '.$request->input('useraccess').' y para acceder a esta información necesitas acceso total', 403);
        }

        return $next($request);
    }
}
