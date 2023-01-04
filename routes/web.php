<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pelayan', [App\Http\Controllers\PelayanController::class, 'index'])->name('pelayan');
Route::get('/pelayan/{id}/modal', [App\Http\Controllers\PelayanController::class, 'edit']);
Route::post('/pelayan/{id}/update', [App\Http\Controllers\PelayanController::class, 'update'])->name('update.obat');
Route::get('/pelayan/cari',[App\Http\Controllers\PelayanController::class,'cari'])->name('cari.data');
Route::get('/pelayan/exportpdf', [App\Http\Controllers\PelayanController::class, 'exportpdf']);


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'create'])->name('add.data');
Route::get('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);
Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('ambil.data');
Route::post('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update.data');
Route::get('/admin',[AdminController::class,'cari'])->name('admin.admin');
Route::get('/admin/exportpdf', [App\Http\Controllers\AdminController::class, 'exportpdf']);


// Route::get('/admin', function () { return view('/admin'); })->middleware('jabatan:Admin');
// Route::get('pelayan', function () { return view('pelayan.pelayan'); })->middleware(['jabatan:Pelayan,Admin']);



