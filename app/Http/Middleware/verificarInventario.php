<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class verificarInventario
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
            if ($user->verificarCargo()==3) {
                return redirect('/home'); 
            }
        }
        return $next($request);
    }
}
