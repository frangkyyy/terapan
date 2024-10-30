<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index'); // Pastikan view ini ada di resources/views/guru/index.blade.php
    }
}
