<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WakasekController extends Controller
{
    public function index()
    {
        return view('wakasek.index'); // Pastikan view ini ada di resources/views/wakasek/index.blade.php
    }
}
