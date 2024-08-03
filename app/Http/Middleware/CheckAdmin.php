<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->email == 'admin@gmail.com') {
                return redirect('/admindashboard')->with('success', 'Login berhasil');
            }
            else {
                return redirect('/dashboard')->with('success', 'Login berhasil');
            }
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
        // return $next($request);
    }
  
}
