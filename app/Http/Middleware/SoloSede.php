<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class SoloSede
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
                return redirect('home');
                 break;
            case "2":
                 return redirect('Central');
                 break;
            case "3":
                return $next ($request);
                break;

        }
            
    }
}
