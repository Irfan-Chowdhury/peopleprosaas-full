<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (env('USER_VERIFIED')!=1) {
            if($request->ajax()){
                return response()->json(['errorMsg' => 'Disabled for demo !'], 422);
            }else {
                return redirect()->back()->withErrors(['errors' => ['Disabled for demo !']]);
            }
        }
        return $next($request);
    }
}
