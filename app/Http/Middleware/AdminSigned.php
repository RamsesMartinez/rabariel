<?php namespace App\Http\Middleware;

use Closure;
use Session;

class AdminSigned
{
   
    public function handle($request, Closure $next)
    {
        if(!Session::has('is_admin')){
            return redirect('user/signin');
        } else{
            return $next($request);
        };
    }
}
