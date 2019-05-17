<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
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
        $usuario_actual=\Auth::user();
        if($usuario_actual->rol_id==1 || $usuario_actual->rol_id==5){
            return $next($request);
        }else{
            $request->session()->flash('message-error', 'No tienes permisos');
            return redirect()->to('/');
        }
    }
}
