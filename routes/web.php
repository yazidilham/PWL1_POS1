<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/',[UserController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list',[UserController::class, 'list']);      // menampilkan data user dalam bentuk json datables
    Route::get('/create', [UserController::class, 'create']);  // menampilkan halaman form tambah user 
    Route::post('/',[UserController::class, 'store']);         // menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // m
    Route::post('/ajax', [UserController::class, 'store_ajax']); // m
    Route::get('/{id}',[UserController::class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit',[UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}',[UserController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}',[UserController::class, 'destroy']); // menghapus data user 

    Route:: get('/{id}/edit_ajax', [UserController :: class, 'edit_ajax' ]); // Menampilkan halaman form edit user Ajax
    Route:: put ('/{id}/update_ajax', [UserController:: class, 'update_ajax' ]); // Menyimpan perubahan data user Ajax
    Route:: get('/{id}/delete_ajax', [UserController:: class, 'confirm_ajax' ]); // Untuk tampilkan form confirm delete user Ajax
    Route:: delete('/{id}/delete_ajax', [UserController:: class, 'delete_ajax' ]); // Untuk hapus data user Ajax
});
