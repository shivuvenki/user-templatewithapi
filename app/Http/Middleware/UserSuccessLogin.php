<?php

namespace App\Http\Middleware;

use Closure;

class UserSuccessLogin
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
		if(isset($user_id)){
			    return $next($request);
		}
		else{
			return redirect('login');
		}
    }
}
