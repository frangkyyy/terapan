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


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleAssignmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DataNilaiSiswaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Auth;

Route::get('', function () {
    return view('auth.login');
});  

Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['isWakasek','auth'],'prefix' => 'wakasek', 'as' => 'wakasek.'], function() {
    Route::get('/listmapel', [MataPelajaranController::class, 'index'])->name('list-mapel');

    Route::get('/datamapel', [MataPelajaranController::class, 'indexdatamapel'])->name('data-mapel');
    Route::get('/mapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'edit'])->name('mapel-edit');
    Route::put('/mapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'update'])->name('mapel-update');
    Route::get('/mapeltambah', [MataPelajaranController::class, 'indextambahdatamapel'])->name('mapel-tambah');
    Route::post('/mapelstore', [MataPelajaranController::class, 'store'])->name('mapel-store');
    Route::delete('/mapel/{id_mata_pelajaran}', [MataPelajaranController::class, 'hapusdatamapel'])->name('mapel-delete');

    Route::get('/datajadwalmapel', [MataPelajaranController::class, 'indexdatajadwalmapel'])->name('data-jadwalmapel');
    Route::get('/jadwalmapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'editjadwalmapel'])->name('jadwalmapel-edit');
    Route::put('/jadwalmapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'updatejadwalmapel'])->name('jadwalmapel-update');

    Route::get('/dataperiode', [PeriodeController::class, 'index'])->name('data-periode');
    Route::get('/periodeedit/{id_periode}', [PeriodeController::class, 'edit'])->name('periode-edit');
});

Route::group(['middleware' => ['isGuru','auth'],'prefix' => 'guru', 'as' => 'guru.'], function() {
    Route::get('dashboard', [GuruController::class, 'index'])->name('dashboard.index');
    Route::get('/DataNilaiSiswa', [DataNilaiSiswaController::class, 'index'])->name('datanilaisiswa');
    Route::get('/Create-DataNilaiSiswa', [DataNilaiSiswaController::class, 'create'])->name('create-datanilaisiswa');
    Route::post('/simpan-datanilaisiswa', [DataNilaiSiswaController::class, 'store'])->name('simpan-datanilaisiswa');
    Route::get('/edit-datanilaisiswa/{id}', [DataNilaiSiswaController::class, 'edit'])->name('edit-datanilaisiswa');
    Route::post('/update-datanilaisiswa/{id}', [DataNilaiSiswaController::class, 'update'])->name('update-datanilaisiswa');
    Route::get('/delete-datanilaisiswa/{id}', [DataNilaiSiswaController::class, 'destroy'])->name('delete-datanilaisiswa');
    Route::get('/cetak-datanilaisiswa', [DataNilaiSiswaController::class, 'cetakDataNilaiSiswa'])->name('cetak-datanilaisiswa');

    Route::get('/MataPelajaran', function () {
        return view('MataPelajaran');
    });
    
    Route::get('/Mapel_1', function () {
        return view('Mapel_1');
    });
});


Auth::routes();
