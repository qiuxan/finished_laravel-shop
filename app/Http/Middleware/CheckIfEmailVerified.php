<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->email_verified) {
            // Return Json if request is via AJAX
            if ($request->expectsJson()) {
                return response()->json(['msg' => 'Please Verify Your Email First'], 400);
            }
            return redirect(route('email_verify_notice'));
        }
        return $next($request);
    }
}
