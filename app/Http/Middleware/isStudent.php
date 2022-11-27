<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isStudent
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
        if (!Auth::user()) {
            return redirect()->route('login')->with('login', 'Anda belum login, silahkan login terlebih dahulu');
        }

        if (Auth::user()->is_teacher == 0) {
            return $next($request);
        }

        return redirect()->route('dashboard.admin')->with('error', 'Anda Bukan Siswa');
    }
}
