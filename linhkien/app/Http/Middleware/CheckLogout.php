<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guest()){  // chưa login thì return  true và ngc lại
            echo "trang logout dã dang xuat";
            return redirect()->intended('/login');
            
        }else{
            echo "trang logout chưa dang xuat";

            return $next($request);
        }
    }
}
