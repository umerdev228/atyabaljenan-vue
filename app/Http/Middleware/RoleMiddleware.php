<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
        if($request->user()==null){
//            return response('Insuficient permissions',403);
            return redirect('login');
        }

        $roles=array_slice(func_get_args(), 2);
        if($request->user()->hasAnyRole($roles) || !$roles){

            return $next($request);
        }

        return response('Insuficient Permissions',403);
    }
}
