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

Route::get('/home', function () {
    return redirect('/user');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/check_user', [SesiController::class, 'check_user']);
    Route::post('/check_user', [SesiController::class, 'check_user_submit']);
});

Route::middleware(['auth'])->group(function () {
    // Admin Only
    Route::middleware(['userAkses:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
        // Master
        Route::resource('/master_pangkat', MasterPangkatController::class);
        Route::put('/master_pangkat/update/{id}', [MasterPangkatController::class, 'update']);
        Route::resource('/master_instansi', MasterInstansiController::class);
        Route::put('/master_instansi/update/{id}', [MasterInstansiController::class, 'update']);
        Route::resource('/master_wilayah', MasterWilayahController::class);
        Route::put('/master_wilayah/update/{id}', [MasterWilayahController::class, 'update']);
        Route::resource('/master_jabatan', MasterJabatanController::class);
        Route::put('/master_jabatan/update/{id}', [MasterJabatanController::class, 'update']);
        // Data PPNS
        Route::resource('/data_ppns', DataPpnsController::class);
        Route::get('/data_ppns/edit/{id}', [DataPpnsController::class, 'edit']);
        Route::put('/data_ppns/update/{id}', [DataPpnsController::class, 'update']);
        Route::get('/data_ppns/filterWilayah/{id}', [DataPpnsController::class, 'perWilayah']);
    });
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/logout', [SesiController::class, 'logout']);
});
