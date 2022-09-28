<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WebController::class, 'index']);
Route::get('/matapelajaran', [App\Http\Controllers\WebController::class, 'matapelajaran']);
Route::get('/matapelajaran/{id}', [App\Http\Controllers\WebController::class, 'matpelDetail']);
Route::get('/latihansoal', [App\Http\Controllers\WebController::class, 'latihansoal']);
Route::post('/latihansoal', [App\Http\Controllers\WebController::class, 'submitLatihan']);
Route::get('/kirimtugas', [App\Http\Controllers\WebController::class, 'kirimtugas']);
Route::get('/kirimtugas/submit/{id}', [App\Http\Controllers\WebController::class, 'kirimtugasForm']);
Route::post('/kirimtugas/submit/{id}', [App\Http\Controllers\WebController::class, 'kirimtugasSubmit']);

Auth::routes([
    'register' => false,
    'reset'    => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/setting', [App\Http\Controllers\SettingController::class, 'index']);
Route::post('/admin/setting', [App\Http\Controllers\SettingController::class, 'update']);

Route::resource('/admin/matapelajaran', App\Http\Controllers\Admin\MataPelajaranController::class)->except('show');
Route::resource('/admin/materi', App\Http\Controllers\Admin\MateriController::class)->except('show');
Route::resource('/admin/soal', App\Http\Controllers\Admin\SoalController::class)->except('show');
Route::resource('/admin/tugas', App\Http\Controllers\Admin\TugasController::class);
