<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WakasekController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view('wakasek.datamapel', compact('user'));
    }
}
