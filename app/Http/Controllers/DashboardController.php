<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Pegawai::count();
        $pegawaiTerbaru = Pegawai::latest('created_at')->take(5)->get();

        return view('dashboard', compact('totalPegawai', 'pegawaiTerbaru'));
    }
}
