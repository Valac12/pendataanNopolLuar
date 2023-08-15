<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

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

        $username = $request->username;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level === '1' &&  auth()->user()->username === $username) {
                $dt = Carbon::now();
                $dateNow = $dt->toDateTimeString();
                $data = User::where('username', $username)->update([
                    'tgl_login' => $dateNow,
                    'online_offline' => 'Online'
                ]);
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->level === '2' &&  auth()->user()->username === $username) {
                $dt = Carbon::now();
                $dateNow = $dt->toDateTimeString();
                $data = User::where('username', $username)->update([
                    'tgl_login' => $dateNow,
                    'online_offline' => 'Online'
                ]);
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('loginError', 'Login Failed!!!');
    }

    public function logout(Request $request)
    {
        // tgl dan waktu Logout
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $user = auth()->user()->id;
        $data = User::find($user);
        $data->tgl_logout = $dateNow;
        $data->online_offline = 'Offline';
        $data->save();

        // hapus session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        dd($dateNow);
    }
}
