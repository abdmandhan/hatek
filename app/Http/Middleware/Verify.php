<?php

namespace App\Http\Middleware;

use Closure;

class Verify
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
        if(auth()->user()->is_verified == 1){
            return $next($request);
          }
            return redirect('about')->with('error','Silahkan verify akun anda.');
    }
}
