<?php

namespace App\Http\Middleware;
use DB;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckAdmin
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
       
        if($request->session()->get('admin_status')!= 1) {
            return redirect('admin');
           
        }
        return $next($request);
      

    }       
}
