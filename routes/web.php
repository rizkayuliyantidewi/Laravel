<?php
use App\Http\Controllers\cobaController;
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

Route::get('', [cobaController::class, 'index']);
Route::get('/friends', [cobaController::class, 'index']);

Route::get('/friends/create', [cobaController::class, 'create']);

Route::post('/friends', [cobaController::class, 'store']);
Route::get('/friends/{id}', [cobaController::class, 'show']);
Route::get('/friends/{id}/edit', [cobaController::class, 'edit']);
Route::delete('/friends/{id}', [cobaController::class, 'destroy']);

