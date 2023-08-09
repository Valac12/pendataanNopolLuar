<?php

namespace App\Http\Controllers;

use App\Models\KodePlat;
use Illuminate\Http\Request;
use App\Models\NopolLuar;
use App\Models\User;
Use Carbon\Carbon;

class NopolKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kp = KodePlat::all();
        $us = User::all();
        $dt = Carbon::now();
        $dateNow = $dt->toDateString();
        return view('dashboard.pendataanNopol.index', [
            'tittle' => 'Pendataan Nomor Polisi Luar',
            'Nopol' => NopolLuar::all(),
            'kodePlat' => $kp,
            'user' => $us,
            'dateNow' => $dateNow,
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
        $validated = $request->validate([
            'no_polisi' => 'required|min:3|unique:nopol_luars',
            'kd_plat' => 'required',
            'samsat_asal' => 'required',
            'asal_kendaraan' => 'required',
            'alamat_sesuai_stnk' => 'required',
            'pemilik' => 'required',
            'id_user_pendataan' => 'required',
            'nama_user' => 'required',
            'tgl_pendataan' => 'required'
        ]);
        NopolLuar::create($validated);
        session()->flash('successCreateNopol', 'Data Berhasil Ditambahkan!');
        return redirect('/pendataanNopol');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        NopolLuar::destroy($id);
        session()->flash('successDelNopol', 'Data berhasil dihapus!');
        return redirect('/pendataanNopol'); 
    }
}
