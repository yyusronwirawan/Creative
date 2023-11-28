<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AccessSession 
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
        $userData = session('__ADMINSESSION__');
        if(session('__ADMINSESSION__')){
            return $next($request);
        }else{
            return redirect('branded-admin/login');
        }
    }
}
