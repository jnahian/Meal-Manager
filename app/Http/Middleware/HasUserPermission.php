<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        if ( hasPermission() )
            return $next( $request );
        
        abort( '403' );
    }
}
