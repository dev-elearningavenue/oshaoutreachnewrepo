<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BdmCheckMiddleware
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
        if($request->has('bdm')) {
            $bdmParam = $request->input('bdm');

            /* redirect to base route without bdm param */
            $request->query->remove('bdm');

            return redirect()->to($request->url());
        }

        return $next($request);
    }
}
