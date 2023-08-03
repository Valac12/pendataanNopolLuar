<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('index', [
            'tittle' => 'Login || Pendataan NOPOL Keluar'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level === '1') {
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->level === '2') {
                return redirect()->intended('/user');
            }
        }
        return back()->with('loginError', 'Login Failed!!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
