<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function schedule()
    {
        $user = Auth::user();

        // Ambil jadwal mata pelajaran siswa
        $subjects = $user->mataPelajaran()
            ->with(['pivot.periode', 'jadwal']) // Pastikan relasi jadwal ada
            ->get();

        return view('siswa.schedule', compact('subjects'));
    }
}
