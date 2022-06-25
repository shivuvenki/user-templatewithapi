<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UserNotLogin
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
        $user_id = session()->get('user_id');
		if(!isset($user_id)){
			    return $next($request);
		}
		else{
		    /*return redirect("dashboard");*/
			$dashboard = session("dashboard");
			return redirect($dashboard);
		}
    }
}
