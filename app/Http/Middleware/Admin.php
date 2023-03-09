<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if(auth()->user()){
            foreach(auth()->user()->roles as $role){
                // dd(auth()->user()->roles);
                if($role->name == 'admin' or $role->id == 2 or $role->id == 3 or $role->id == 4 ){
                    return $next($request);
                }
                return redirect(route('login'));
            }

        }
        return redirect(route('login'));

    }
}
