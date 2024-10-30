<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->id_role;

            switch ($role) {
                case 1:
                    return redirect()->route('admin.index');
                case 2:
                    return redirect()->route('guru.index');
                case 3:
                    return redirect()->route('wakasek.index');
                case 4:
                    return redirect()->route('siswa.index');
                default:
                    return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
