<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KodePlatController;
use App\Http\Controllers\NopolKeluarController;
use App\Http\Controllers\NopolDetail;
use App\Http\Controllers\CetakDataController;
use App\Http\Controllers\BalikNamaController;

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
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginAuth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/kelolaAdmin', AdminController::class)->middleware('admin');
Route::resource('/kelolaUsers', UsersController::class)->middleware('admin');
Route::resource('/kelolaKodePlat', KodePlatController::class)->middleware('admin');
Route::resource('/pendataanNopol', NopolKeluarController::class)->middleware('auth');
Route::get('/nopolDetail', [NopolDetail::class, 'index'])->middleware('auth');
Route::get('/cetakData', [CetakDataController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/balik-nama', BalikNamaController::class);
// Route::get('/cetakDataPage', [CetakDataController::class, 'CetakDataPage']);
// Route::get('/cetakDataFilter', [CetakDataController::class, 'CetakDataFilter']);
