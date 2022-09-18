<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class Validation
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
      
		if(Auth::user() && Auth::user()->date_validation == null)
        {            
			session()->flash('type', 'alert-danger');
			session()->flash('message', 'Valider le compte.');
			
			return  redirect()->route('user.validation');
			
        }
		
		return $next($request);
    }
}
