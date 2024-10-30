<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Pastikan view ini ada di resources/views/admin/index.blade.php
    }
}
