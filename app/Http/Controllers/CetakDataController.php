<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mPDF;

class CetakDataController extends Controller
{
    public function index()
    {
        return view('dashboard.cetakData', [
            'tittle' => 'Cetak Data'
        ]);
    }

    public function cetakData(Request $request)
    {
        dd($request->tgl_awal);
    }

    public function cetakDataPage()
    {
        $mpdf = new mPDF();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
        // return view('dashboard.cetakDataPage');
    }
}
