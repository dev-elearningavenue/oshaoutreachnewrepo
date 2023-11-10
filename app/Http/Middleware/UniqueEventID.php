<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniqueEventID
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
        $randomString = Str::random(20);

        if(!session()->has('unique_event_id')) {
            session()->put('unique_event_id', $randomString);
        }


        return $next($request);
    }
}
