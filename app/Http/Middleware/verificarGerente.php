<?php

namespace App\Http\Middleware;

use Closure;

class verificarGerente
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
            if ($user->verificarCargo()==5) {
                return $next($request);
            }
            else{
                return redirect('/home'); 
            }
        }
        
    }
}
