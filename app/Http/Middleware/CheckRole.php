<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if(!Auth::check()) {
            return redirect('/auth/login');
        }


        #Verificando se o User é Admim
        if(Auth::user()->role <> "$role") {
            return redirect('/auth/login');
        }


        return $next($request);
    }
}
