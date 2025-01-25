<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DataNilaiSiswaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\WakasekController;
use Illuminate\Support\Facades\Auth;

Route::get('', function () {
    return view('auth.login');
});  

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['isWakasek','auth'],'prefix' => 'wakasek', 'as' => 'wakasek.'], function() {
    Route::get('dashboard', [WakasekController::class, 'index'])->name('dashboard.index');

    Route::get('/listmapel', [MataPelajaranController::class, 'index'])->name('list-mapel');

    Route::get('/datamapel', [MataPelajaranController::class, 'indexdatamapel'])->name('data-mapel');
    Route::get('/mapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'edit'])->name('mapel-edit');
    Route::put('/mapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'update'])->name('mapel-update');
    Route::get('/mapeltambah', [MataPelajaranController::class, 'indextambahdatamapel'])->name('mapel-tambah');
    Route::post('/mapelstore', [MataPelajaranController::class, 'store'])->name('mapel-store');
    Route::delete('/mapel/{id_mata_pelajaran}', [MataPelajaranController::class, 'hapusdatamapel'])->name('mapel-delete');

    Route::get('/check-jam', [MataPelajaranController::class, 'checkJam']);
    Route::get('/check-mapel', [MataPelajaranController::class, 'checkMapel'])->name('check-mapel');

    Route::get('/datajadwalmapel', [MataPelajaranController::class, 'indexdatajadwalmapel'])->name('data-jadwalmapel');
    Route::get('/jadwalmapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'editjadwalmapel'])->name('jadwalmapel-edit');
    Route::put('/jadwalmapeledit/{id_mata_pelajaran}', [MataPelajaranController::class, 'updatejadwalmapel'])->name('jadwalmapel-update');

    Route::get('/dataperiode', [PeriodeController::class, 'index'])->name('data-periode');
    Route::get('/periodeedit/{id_periode}', [PeriodeController::class, 'edit'])->name('periode-edit');
    Route::put('/periodeedit/{id_periode}', [PeriodeController::class, 'update'])->name('periode-update');
});

Route::group(['middleware' => ['isGuru','auth'],'prefix' => 'guru', 'as' => 'guru.'], function() {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('dashboard.index');

    Route::get('scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('scores/{score}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
    Route::put('scores/{score}', [ScoreController::class, 'update'])->name('scores.update');
    Route::delete('scores/{score}', [ScoreController::class, 'destroy'])->name('scores.destroy');

    Route::get('assign-student-to-subject', [AssignmentController::class, 'create'])->name('assignStudentToSubjectForm');
    Route::post('assign-student-to-subject', [AssignmentController::class, 'store'])->name('assignStudentToSubject');
    Route::get('assignments', [AssignmentController::class, 'index'])->name('indexAssignments');

});

Auth::routes();
