<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'tittle' => 'Kelola Users',
            'user' => User::where('level', '2')->get()
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
        session()->flash('successCreateUser', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaUsers');
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
        
        $validate = $request->validate([
            'nama' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            'level' => 'required',
            'nama_level' => 'required',
            'online_offline' => 'required'
        ]);
        $pass = auth()->user()->password;
        $cek = $validate['password'];
        if(Hash::check($cek,$pass)) {
            $validate['password'] = bcrypt($validate['password']);
        }else {
            session()->flash('faillUpUser', 'Password tidak sesuai!');
            return redirect('/kelolaUsers');
        }
        User::where('id', $id)->update($validate);
        session()->flash('successUpUser', 'User berhasil diupdate!');
        return redirect('/kelolaUsers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        session()->flash('successDelUser', 'Data berhasil dihapus!');
        return redirect('/kelolaUsers');
    }
}
