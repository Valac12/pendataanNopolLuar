<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NopolLuar;

use mPDF;

class CetakDataController extends Controller
{
    public function index()
    {
        $nopol = NopolLuar::latest();
        if(request('tgl_awal') && request('tgl_akhir')) {
            $nopol->whereBetween('tgl_pendataan', [request('tgl_awal'), request('tgl_akhir')]);
        }
        return view('dashboard.cetakData', [
            'tittle' => 'Cetak Data',
            'Nopol' => $nopol->get()
        ]);
    }

    // public function cetakData(Request $request, NopolLuar $nopolLuar)
    // {
    //     $cetakData = $nopolLuar->whereBetween('tgl_pendataan', [$request->tgl_awal, $request->tgl_akhir]);
    //     return view('dashboard.cetakDataPage', [
    //         'cetakData' => $cetakData
    //     ]);
    // }

    // public function cetakDataFilter(Request $request, NopolLuar $nopolLuar)
    // {
    //     $tgl_awal = $request->tgl_awal;
    //     $tgl_akhir = $request->tgl_akhir;

    //     $cetakData = $nopolLuar->whereBetween('tgl_pendataan', [$tgl_awal, $tgl_akhir]);
    //     return view('dashboard.cetakData', [
    //         'Nopol' => $cetakData,
    //         'tittle' => 'Cetak Data'
    //     ]);
    // }
}
