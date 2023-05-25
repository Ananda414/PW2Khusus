<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return "Halaman Profil";
// });

// Route::get('/dosen', function() {
//     return view('dosen');
// });

// Route::get('/dosen/index', function() {
//     return view('dosen.index');
// });

// Route::get('/fakultas', function() {
//     // return view('fakultas.index', ['fikr' => 'fakultas ilmu komputer dan rekayasa']);
//     return view('fakultas.index') -> with('dataFakultas', ['fikr', 'feb']);
// });

Route::resource('fakultas', FakultasController::class);

Route::resource('prodi', ProdiController::class);

Route::resource('mahasiswa', MahasiswaController::class);

Route::post('mhs-multi=delete', [MahasiswaController::class, 'multiDelete'])->name('mhs-multi-delete');