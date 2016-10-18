<?php

namespace App\Http\Middleware;

use Closure;

class myauth
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
        if(empty(session()->get('adminuser'))){//检查adminuser里面是否有值 
            
            return redirect("Business/login");

        }
        return $next($request);
    }
}
