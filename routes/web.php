<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//Route::get('/admin/index', function () {
//    return view('dashboard');
//})->name('admin.index')->middleware('auth');
//
//Route::get('/guru/index', function () {
//    return view('guru.index');
//})->name('guru.index')->middleware('auth');
//
//Route::get('/wakasek/index', function () {
//    return view('wakasek.index');
//})->name('wakasek.index')->middleware('auth');
//
//Route::get('/siswa/index', function () {
//    return view('siswa.index');
//})->name('siswa.index')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/guru', [\App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
    Route::get('/wakasek', [\App\Http\Controllers\WakasekController::class, 'index'])->name('wakasek.index');
    Route::get('/siswa', [\App\Http\Controllers\SiswaController::class, 'index'])->name('siswa.index');
});

// Route untuk logout
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
