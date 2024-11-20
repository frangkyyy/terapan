<?php

use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified', 'admin']);   


use App\Http\Controllers\AdminController;

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/listmapel', [HomeController::class, 'index'])->name('list-mapel');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/listmapel', [\App\Http\Controllers\MataPelajaranController::class, 'index'])->name('list-mapel');

    Route::get('/datamapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatamapel'])->name('data-mapel');
    Route::get('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'edit'])->name('mapel-edit');
    Route::put('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'update'])->name('mapel-update');

    Route::get('/datajadwalmapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatajadwalmapel'])->name('data-jadwalmapel');
    Route::get('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'editjadwalmapel'])->name('jadwalmapel-edit');
    Route::put('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'updatejadwalmapel'])->name('jadwalmapel-update');

    Route::get('/dataperiode', [\App\Http\Controllers\PeriodeController::class, 'index'])->name('data-periode');
    Route::get('/periodeedit/{id_periode}', [\App\Http\Controllers\PeriodeController::class, 'edit'])->name('periode-edit');
});

require __DIR__.'/auth.php';
