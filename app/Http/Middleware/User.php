<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class User
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
        //dd(Auth::user()->profil_id);

        if(Auth::user()->profil_id == 3){
                return $next($request);
        }else{
            session()->flash('type', 'alert-danger');
			session()->flash('message', "Vous n'avez pas acces à cette section");
			return redirect()->route('home');
        }
			
        
    }
}
