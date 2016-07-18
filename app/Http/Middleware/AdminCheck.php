<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
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
        if (\Gate::denies("adminRole")){
            return \Redirect::action('HomeController@index')->with('dialog','Users not allowed for this action. Only admin');
        }

        return $next($request);
    }
}
