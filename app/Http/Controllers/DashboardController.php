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
        $nopolStatus1 = NopolLuar::where('status', 'Sudah Balik Nama')->count();
        $nopolStatus2 = NopolLuar::where('status', 'Belum Balik Nama')->count();
        // dd($nopolStatus1);
        return view('dashboard.index', [
            'tittle' => 'Home',
            'pegawai' => $pegawai,
            'nopol' => $nopol,
            'nopolStatus1' => $nopolStatus1,
            'nopolStatus2' => $nopolStatus2
        ]);
    }
}
