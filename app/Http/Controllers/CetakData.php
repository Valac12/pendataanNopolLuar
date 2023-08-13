<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CetakData extends Controller
{
    public function index()
    {
        return view('dashboard.cetakData');
    }
}
