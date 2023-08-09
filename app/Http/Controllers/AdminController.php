<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index', [
            'tittle' => 'Kelola Admin',
            'userAdmin' => User::where('level', '1')->get()
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
            'nama' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            'level' => 'required',
            'nama_level' => 'required',
            'online_offline' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate, ['tgl_login' => null, 'tgl_logout' => null]);
        session()->flash('successCreateAdmin', 'Admin Berhasil Ditambahkan!');
        return redirect('/kelolaAdmin');
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
        User::destroy($id);
        session()->flash('successDelAdmin', 'Admin berhasil dihapus!');
        return redirect('/kelolaAdmin');
    }
}
