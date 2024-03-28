<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', function (){
    return view('index');
});

Route::get('/user', [UserController::class,'index'])->name('UserIndex');

Route::get('/master_data', [UserController::class,'masterdata'])->name('UserIndex');

Route::get('/tambahuser', [UserController::class,'tambah']);

Route::post('/kirimuser',[UserController::class, 'add']);

Route::get('/user/detail/{id}',[UserController::class,'detail']);

Route::get('/user/edit/{id}',[UserController::class,'detailedit']);

Route::post('/edituser/{id}',[UserController::class,'edit']);

// route::get('/user/delete{id_pelanggan}',[UserController::class, 'delete']);

Route::delete('/user/delete/{id}', [UserController::class, 'delete']);