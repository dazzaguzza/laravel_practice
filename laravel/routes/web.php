<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImageController;
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

Route::get('login',[LoginController::class,'create'])->name('login');
Route::post('login',[LoginController::class,'store']);
Route::post('logout',[LoginController::class,'destroy']);

Route::get('items', [ItemController::class, 'index']);
Route::get('items/create', [ItemController::class, 'create'])->middleware('auth');
Route::post('items', [ItemController::class,'store']);
Route::get('items/{id}',[ItemController::class,'show']);
Route::get('items/{id}/edit',[ItemController::class,'edit'])->middleware('auth');
Route::patch('items/{id}',[ItemController::class,'update'])->middleware('auth');
Route::delete('items/{id}',[ItemController::class,'destroy'])->middleware('auth');

Route::get('items/{id}/tracks/create',[TrackController::class,'create']);
Route::post('items/{id}/tracks',[TrackController::class,'store']);
Route::delete('tracks/{id}',[TrackController::class,'destroy']);

Route::get('users',[UserController::class,'index']);
Route::get('users/create',[UserController::class,'create']);
Route::post('users',[UserController::class,'store']);
Route::get('users/{id}/edit',[UserController::class,'edit']);
Route::patch('users/{id}',[UserController::class,'update']);
Route::delete('users/{id}',[UserController::class,'destroy']);

Route::get('users/{id}/password',[UserController::class,'password_edit']);
Route::patch('users/{id}/password',[UserController::class,'password_update']);

Route::get('employees',[EmployeeController::class,'index']);
Route::get('employees/create',[EmployeeController::class,'create']);
Route::post('employees',[EmployeeController::class,'store']);

Route::get('image-upload', [ ImageController::class, 'upload' ])->name('image.upload');
Route::post('image-store', [ ImageController::class, 'store' ])->name('image.upload.post');