<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) // $request - users request, $next - next Middleware
    {
		if ($request->route('param')!= 'example') {
			return redirect()->route('home');
		}
		else
			return redirect()->route('welcome');
        return $next($request);
    }
}
