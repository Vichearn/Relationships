<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->isAdmin()) {
            return $next($request);
        }
        session()->flash('error_message','You do not have permission to access the admin page.');
        return redirect('home');
        //->withErrors(['You do not have permission to access the admin page.']);
    }
}
