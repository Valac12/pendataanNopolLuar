<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodePlat;

class KodePlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kodePlat', [
            'tittle' => 'Kode Plat',
            'kodePlat' => KodePlat::all()
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
        $validate = $request->validate([
            'kode_plat' => 'required|numeric|unique:kode_plats',
            'warna_plat' => 'required|unique:kode_plats'
        ]);

        KodePlat::create($validate);
        session()->flash('successCreateKp', 'Kode Plat Berhasil Ditambahkan!');
        return redirect('/kelolaKodePlat');
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
        KodePlat::destroy($id);
        session()->flash('successDelKp', 'Kode Plat Berhasil Dihapus!');
        return redirect('/kelolaKodePlat');
    }
}
