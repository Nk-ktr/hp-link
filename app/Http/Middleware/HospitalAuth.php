<?php

namespace App\Http\Middleware;

use Closure;

class HospitalAuth
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
        if(auth()->check() && auth()->user()->role == 'hospital') {

        return $next($request);

        }

        return redirect('hospital/hospital_home');
    }
}
