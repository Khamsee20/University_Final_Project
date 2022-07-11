<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->roles == 'Member'){
            return $next($request);
        }

        return redirect('home')->with('error', 'ທ່ານບໍ່ມີສິດເຂົ້າສູ່ລະບົບຂ້ອງເຈົ້າຂອງຫ້ອງແຖວ');
    }
}
