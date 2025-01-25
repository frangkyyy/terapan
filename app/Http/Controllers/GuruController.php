<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view('guru.dashboard', compact('user'));
    }
}
