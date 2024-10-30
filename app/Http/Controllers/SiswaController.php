<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index'); // Pastikan view ini ada di resources/views/siswa/index.blade.php
    }
}
