<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route ke dashboard
Route::get('/Dashboard/{account_id}/{name_account}',[ListController::class , 'index'])->name('dashboard');

Route::get('/create/list/{account_id}/{name_account}',[ListController::class , 'create'])->name('membuatList');

Route::post('/create/list/progress/{user_id}',[ListController::class , 'store'])->name('membuatListproses');

Route::get('/create/kategori',[KategoriController::class , 'create'])->name('membuatKategori');

Route::post('/create/kategori/progress/{user_id}',[KategoriController::class ,'store'])->name('membuatKategoriProses');

Route::patch('/checkList/{listModel}/{judul_list}',[ListController::class , 'list_selesai'])->name('listSelesai');

Route::get('/profile/account/{id_account}/{name_account}',[ListController::class , 'detail_account'])->name('profileAccount');

Route::get('/cetak/list/activity/{id}',[ListController::class , 'cetak_list_activity'])->name('cetak_list_activity');

Route::get('/cetak/list/done/{id}',[ListController::class , 'cetak_list_done'])->name('cetak_list_done');

Route::patch('/update/avatar/{name}',[HomeController::class , 'update_avatar'])->name('update-avatar');


