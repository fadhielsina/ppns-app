<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataPpnsController;
use App\Http\Controllers\Admin\MasterInstansiController;
use App\Http\Controllers\Admin\MasterJabatanController;
use App\Http\Controllers\Admin\MasterPangkatController;
use App\Http\Controllers\Admin\MasterWilayahController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    // Master
    Route::resource('/master_pangkat', MasterPangkatController::class)->middleware('userAkses:admin');
    Route::put('/master_pangkat/update/{id}', [MasterPangkatController::class, 'update'])->middleware('userAkses:admin');
    Route::resource('/master_instansi', MasterInstansiController::class)->middleware('userAkses:admin');
    Route::put('/master_instansi/update/{id}', [MasterInstansiController::class, 'update'])->middleware('userAkses:admin');
    Route::resource('/master_wilayah', MasterWilayahController::class)->middleware('userAkses:admin');
    Route::put('/master_wilayah/update/{id}', [MasterWilayahController::class, 'update'])->middleware('userAkses:admin');
    Route::resource('/master_jabatan', MasterJabatanController::class)->middleware('userAkses:admin');
    Route::put('/master_jabatan/update/{id}', [MasterJabatanController::class, 'update'])->middleware('userAkses:admin');

    Route::resource('/data_ppns', DataPpnsController::class)->middleware('userAkses:admin');
    Route::get('/data_ppns/edit/{id}', [DataPpnsController::class, 'edit'])->middleware('userAkses:admin');
    Route::put('/data_ppns/update/{id}', [DataPpnsController::class, 'update'])->middleware('userAkses:admin');

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/home', function () {
    return redirect('/admin');
});
