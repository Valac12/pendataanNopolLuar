<?php

namespace App\Http\Controllers;

use App\Models\NopolLuar;
use Illuminate\Http\Request;

class BalikNamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noPolisi = NopolLuar::select('no_polisi')->get();
        $idNoPolisi = NopolLuar::select('id')->get();
        $balikNama = NopolLuar::where('status', 'Sudah Balik Nama')->get();
        return view('dashboard.balikNama', [
            'tittle' => 'Balik Nama',
            'noPolisi' => $noPolisi,
            'balikNama' => $balikNama,
            'idNoPolisi' => $idNoPolisi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cek = NopolLuar::all();
        $cekValue = $cek->where('no_polisi', $request->no_polisi)->first();
        $cek2 = $cekValue->status;
        // dd($cek2);
        if ($cek2 == 'Sudah Balik Nama') {
            session()->flash('faillBalikNama', 'Status Plat ' . $request->no_polisi . ' telah diperbaruhi sebelumnya!');
            return redirect('/dashboard/balik-nama');
        }
        $status = NopolLuar::where('no_polisi', $request->no_polisi)->update(['status' => $request->status]);
        session()->flash('successBalikNama', 'Status berhasil diperbaruhi!');
        return redirect('/dashboard/balik-nama');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
