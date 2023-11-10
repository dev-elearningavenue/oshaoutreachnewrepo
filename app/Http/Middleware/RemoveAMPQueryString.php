<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveAMPQueryString
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('outputType')) {
            /* redirect to base route without bdm param */
            $request->query->remove('outputType');

            return redirect()->to($request->url(), 301);
        }

        return $next($request);
    }
}
