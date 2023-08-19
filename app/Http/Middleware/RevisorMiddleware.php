<?php

namespace App\Http\Middleware;
use  App\Http\Controllers;
use Closure;
use Illuminate\Http\Request;


namespace App\Http\Middleware;

use Closure;

class RevisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->is_revisor) {
            return $next($request);
        }

        return redirect('/'); // Redirige a la página principal o a otra página según tus necesidades
    }
}
