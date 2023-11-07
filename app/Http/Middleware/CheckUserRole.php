<?php

namespace App\Http\Middleware;

use App\Models\Book;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->roles_id === 1) {
            return $next($request);
        }

        return redirect()->route('auth.login')->with('message.error', 'Lo siento, pero esta vista solo está permitida para administradores.');
    }

}