<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhoneIsVerified
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
      if (! auth()->user()->hasVerifiedPhone()) {
            return redirect()->route('otp');
        }
        return $next($request);
    }
}
