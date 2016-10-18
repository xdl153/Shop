<?php

namespace App\Http\Middleware;

use Closure;

class zhongjian
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
		//判断session中是否有userid
		if(empty(session()->get('userid'))){
			return redirect("/");
		}
        return $next($request);
    }
}
