<?php

use Illuminate\Support\Facades\Route;
use App\Models\MataPelajaran;

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/check-mapel', function (Request $request) {
    $mapelName = $request->query('name');

    $exists = MataPelajaran::where('nama_mata_pelajaran', $mapelName)->exists();

    return response()->json(['exists' => $exists]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/listmapel', [\App\Http\Controllers\MataPelajaranController::class, 'index'])->name('list-mapel');

    Route::get('/datamapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatamapel'])->name('data-mapel');
    Route::get('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'edit'])->name('mapel-edit');
    Route::put('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'update'])->name('mapel-update');
    Route::get('/mapeltambah', [\App\Http\Controllers\MataPelajaranController::class, 'indextambahdatamapel'])->name('mapel-tambah');
    Route::post('/mapelstore', [\App\Http\Controllers\MataPelajaranController::class, 'store'])->name('mapel-store');
    Route::delete('/mapel/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'hapusdatamapel'])->name('mapel-delete');

    Route::get('/check-jam', [\App\Http\Controllers\MataPelajaranController::class, 'checkJam']);
    Route::get('/check-mapel', [\App\Http\Controllers\MataPelajaranController::class, 'checkMapel'])->name('check-mapel');

    Route::get('/datajadwalmapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatajadwalmapel'])->name('data-jadwalmapel');
    Route::get('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'editjadwalmapel'])->name('jadwalmapel-edit');
    Route::put('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'updatejadwalmapel'])->name('jadwalmapel-update');

    Route::get('/dataperiode', [\App\Http\Controllers\PeriodeController::class, 'index'])->name('data-periode');
    Route::get('/periodeedit/{id_periode}', [\App\Http\Controllers\PeriodeController::class, 'edit'])->name('periode-edit');
    Route::put('/periodeedit/{id_periode}', [\App\Http\Controllers\PeriodeController::class, 'update'])->name('periode-update');
});

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
