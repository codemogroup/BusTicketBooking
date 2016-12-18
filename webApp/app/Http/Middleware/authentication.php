<?php

namespace App\Http\Middleware;

use Closure;

class authentication
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
        if(session()->has('user')){
//            return redirect('ownerhome')->with(['email'=>session()->get('user')]);
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
