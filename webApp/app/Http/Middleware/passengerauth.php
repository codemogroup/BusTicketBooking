<?php

namespace App\Http\Middleware;

use Closure;

class passengerauth
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
        if(session()->has('customer')){
//            return redirect('ownerhome')->with(['email'=>session()->get('user')]);
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
