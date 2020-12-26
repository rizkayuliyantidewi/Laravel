<?php
use App\Http\Controllers\GroupsController;
use App\Model\Friends;
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
//Route::get('/friends', [cobaController::class, 'index']);

//Route::get('/friends/create', [cobaController::class, 'create']);

//Route:POST('/friends', [cobaController::class, 'store']);
//Route::get('/friends/{id}', [cobaController::class, 'show']);
//Route::get('/friends/{id}/edit', [cobaController::class, 'edit']);
//Route::put('/friends/{id}', [cobaController::class, 'update']);
//Route::delete('/friends/{id}', [cobaController::class, 'destroy']);


Route::resources([
    'friends' => cobaController::class,
    'groups' => GroupsController::class,
]);
Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updateaddmember']);
Route::put('/groups/deleteaddmember/{group}', [GroupsController::class, 'deleteaddmember']);