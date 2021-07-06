<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrontAuth
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
      if($request->session()->has('USER_LOGIN_ID')){

      }else{
        $request->session()->flash('error','Access Denied');
        return redirect('/');
      }
      return $next($request);
    }
}
