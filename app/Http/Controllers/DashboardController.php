<?php

namespace App\Http\Controllers;

use App\Models\NopolLuar;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = User::all()->count();
        $nopol = NopolLuar::all()->count();
        return view('dashboard.index', [
            'tittle' => 'Home',
            'pegawai' => $pegawai,
            'nopol' => $nopol
        ]);
    }
}
