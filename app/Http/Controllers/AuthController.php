<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->role=='admin') {
                return redirect('/admindashboard')->with('success', 'Login berhasil');
            }
            else {
                return redirect('/dashboard')->with('success', 'Login berhasil');
            }
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}


