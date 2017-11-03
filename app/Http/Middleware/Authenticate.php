<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)//реализуется логика
    {
        if (Auth::guard($guard)->guest()) { // является ли пользователь гостем
            if ($request->ajax() || $request->wantsJson()) { //
                return response('Unauthorized.', 401); //если не авторизирован
            } else {
                return redirect()->guest('/admin');// если авторизирован
            }
        }

        return $next($request);
    }
}
