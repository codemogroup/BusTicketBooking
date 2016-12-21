<?php

namespace App\Http\Middleware;

use Closure;

class operator_authentication
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
        if(session()->has('id')){
//            return redirect('ownerhome')->with(['email'=>session()->get('user')]);
            return $next($request);
        }else{
            return view('operator.operator_signin');
        }
    }
}
