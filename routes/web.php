<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleTestController;

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

Route::get('/', [\App\Http\Controllers\SimpleTestController::class, 'index']);
Route::post('/store', [\App\Http\Controllers\SimpleTestController::class, 'store'])->name('user.color');
Route::get('/read', [SimpleTestController::class, 'read']);
Route::delete('/delete/{id}', [SimpleTestController::class, 'delete']);
