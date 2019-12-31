<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isAdmin())
            return $next($request);

        if ($request->route('user')->id === $request->user()->id)
            return $next($request);

        abort('403', 'Sorry! You are not authorised to see this.');
    }
}
