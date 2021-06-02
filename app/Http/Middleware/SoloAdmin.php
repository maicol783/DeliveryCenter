<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
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
        switch (auth::user()->tipo) {
            case "1":
                return $next ($request);
                break;
            case "2":
                 return redirect('Central');
                 break;
            case "3":
                return redirect('Sede');
                break;

        }
            
    }
}
