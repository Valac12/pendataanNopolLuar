<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NopolDetail extends Controller
{
    public function index(){
        return view('dashboard.pendataanNopol.detailPendataan');
    }
}
