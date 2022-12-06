<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MustahikController;
use App\Http\Controllers\ExcelController;

use App\Http\Controllers\PDFController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login_action']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/users', [UsersController::class, 'data_user']);
Route::get('/mustahik', [MustahikController::class, 'data_mustahik']);
Route::get('/pengajuan', [MustahikController::class, 'data_pengajuan']);
Route::get('/survey', [MustahikController::class, 'data_survey']);
Route::get('/penyaluran', [MustahikController::class, 'data_penyaluran']);
Route::get('/pleno', [MustahikController::class, 'data_pleno']);
Route::get('/pending', [MustahikController::class, 'data_pending']);
Route::get('/disetujui', [MustahikController::class, 'data_disetujui']);
Route::get('/ditolak', [MustahikController::class, 'data_ditolak']);
Route::get('/tambah_mustahik', [MustahikController::class, 'tambah_mustahik']);
Route::post('/mustahik', [MustahikController::class, 'simpan_mustahik']);
Route::get('/edit_mustahik/{id}', [MustahikController::class, 'edit_mustahik']);
Route::post('/ubah_mustahik', [MustahikController::class, 'ubah_mustahik']);
Route::get('/hapus_mustahik/{id}', [MustahikController::class, 'hapus_mustahik']);
Route::get('/password', [UsersController::class, 'password']);
Route::post('/password', [UsersController::class, 'ubah_password']);

Route::get('/tambah_user', [UsersController::class, 'tambah_user']);
Route::post('/simpan_user', [UsersController::class, 'simpan_user']);
Route::get('/edit_user/{id}', [UsersController::class, 'edit_user']);
Route::get('/hapus_user/{id}', [UsersController::class, 'hapus_user']);
Route::post('/ubah_user', [UsersController::class, 'ubah_user']);

Route::get('/detail-proses/{id}', [MustahikController::class, 'detail_proses']);
Route::get('/detail-proses-pengajuan/{id}', [MustahikController::class, 'detail_proses_pengajuan']);
Route::get('/detail-disetujui/{id}', [MustahikController::class, 'detail_disetujui']);
Route::get('/detail-pending/{id}', [MustahikController::class, 'detail_pending']);
Route::get('/detail-ditolak/{id}', [MustahikController::class, 'detail_ditolak']);
Route::get('/detail-proses-survey/{id}', [MustahikController::class, 'detail_proses_survey']);
Route::get('/detail-proses-pleno/{id}', [MustahikController::class, 'detail_proses_pleno']);
Route::get('/detail-proses-pending/{id}', [MustahikController::class, 'detail_proses_pending']);
Route::get('/dokumentasi-survey/{id}', [MustahikController::class, 'dokumentasi_survey']);
Route::get('/dokumentasi-penyaluran/{id}', [MustahikController::class, 'dokumentasi_penyaluran']);
Route::get('/hapus-photo-survey/{id}/{idm}', [MustahikController::class, 'hapus_photo_survey']);
Route::get('/hapus-photo-penyalur/{id}/{idm}', [MustahikController::class, 'hapus_photo_penyalur']);

Route::post('/simpan-survey', [MustahikController::class, 'simpan_survey']);
Route::post('/simpan-penyaluran', [MustahikController::class, 'simpan_penyaluran']);

Route::post('/simpan-keputusan', [MustahikController::class, 'simpan_keputusan']);

Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);
Route::get('mustahik-pdf', [PDFController::class, 'mustahikPDF']);

Route::controller(ExcelController::class)->group(function () {
    Route::get('mustahik-export/{id}', 'export')->name('mustahik.export');
    Route::get('mustahik-export-staff', 'export_staff')->name('mustahik.export.staff');
});
