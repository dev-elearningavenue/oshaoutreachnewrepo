<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $allowedUserIds = [1, 6];

        if($role == 'admin')
            $allowedUserIds = [1];

        if(!in_array($request->user()->id, $allowedUserIds)) {
//           abort(403);
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
