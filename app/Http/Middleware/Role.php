<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        //        if (!$request->user()->hasRole($role)) {
        //            abort(403, 'Unauthorized action.');
        //        }
        if($request->user()->role !== $role)
            //            if($request->user()->role === 'admin')
            //                return redirect('/admin/dashboard');
            //            else if($request->user()->role === 'agent')
            //                return redirect('/agent/dashboard');
            //            else if($request->user()->role === 'user')
            return redirect('/dashboard');
        return $next($request);
    }
}
