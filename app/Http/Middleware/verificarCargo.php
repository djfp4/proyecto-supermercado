<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class verificarCargo
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
        $user=Auth::user();

        if (isset($user)!=null) {
            if ($user->verificarCargo()==2) {
                return redirect('/home'); 
            }
        }
        return $next($request);
    }
}
