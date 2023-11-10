<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SpecialDiscountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validNames = [
            'limitedtimeoffer2022' => 0,
            '55osha129' => 0,
//            '49osha99' => 1
            'exclusivediscount' => 1
        ];

        // Remove 49osha99 cookie if it exists in request
//        if($request->cookie('special') == 1) {
//            $forgetSpecialCookie = Cookie::forget('special');
//
//            return redirect()->to($request->url())->withCookie($forgetSpecialCookie);
//        }

        if($request->has('special') && !isset($validNames[$request->input('special')])) {
            $request->query->remove('special');
            return redirect()->to($request->url());
        }

        if ($request->has('special') && isset($validNames[$request->input('special')])) {
            $specialParam = $request->input('special');

            $expiry = 60 * 1440; // 60 days

            /* Set Cookie */
            $specialCookie = cookie('special', $validNames[$specialParam], $expiry);

            /* redirect to base route without bdm param */
            $request->query->remove('special');

            return redirect()->to($request->url())->withCookie($specialCookie);
        }

        return $next($request);
    }
}
