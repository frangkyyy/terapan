<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('dashboard/admin', [HomeController::class, 'index'])->name('dashboard.admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/listmapel', [\App\Http\Controllers\MataPelajaranController::class, 'index'])->name('list-mapel');

    Route::get('/datamapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatamapel'])->name('data-mapel');
    Route::get('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'edit'])->name('mapel-edit');
    Route::put('/mapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'update'])->name('mapel-update');
    Route::get('/mapeltambah', [\App\Http\Controllers\MataPelajaranController::class, 'indextambahdatamapel'])->name('mapel-tambah');
    Route::post('/mapelstore', [\App\Http\Controllers\MataPelajaranController::class, 'store'])->name('mapel-store');
    Route::delete('/mapel/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'hapusdatamapel'])->name('mapel-delete');

    Route::get('/datajadwalmapel', [\App\Http\Controllers\MataPelajaranController::class, 'indexdatajadwalmapel'])->name('data-jadwalmapel');
    Route::get('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'editjadwalmapel'])->name('jadwalmapel-edit');
    Route::put('/jadwalmapeledit/{id_mata_pelajaran}', [\App\Http\Controllers\MataPelajaranController::class, 'updatejadwalmapel'])->name('jadwalmapel-update');

    Route::get('/dataperiode', [\App\Http\Controllers\PeriodeController::class, 'index'])->name('data-periode');
    Route::get('/periodeedit/{id_periode}', [\App\Http\Controllers\PeriodeController::class, 'edit'])->name('periode-edit');

    Route::get('datauser/{role}', [UserController::class, 'loadAllUsers'])->name('user');
    Route::get('datauser-add-{role}', [UserController::class, 'loadAddForm']);
    Route::get('edit-datauser/{id}/{role}', [UserController::class, 'loadEditForm'])->name('edit-user');
    Route::put('edit-datauser/{id}/{role}', [UserController::class, 'EditUser'])->name('EditUser');
    Route::get('delete-datauser/{id}/{role}', [UserController::class, 'deleteUser'])->name('user.delete');
});

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


require __DIR__.'/auth.php';
