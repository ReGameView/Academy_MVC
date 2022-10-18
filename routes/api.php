<?php

use App\Http\Controllers\API\CRUDController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/user', [UserController::class, 'index'])->name('api.user.index');
//Route::post('/user', [UserController::class, 'create'])->name('api.user.create');
//Route::get('/user/{id}', [UserController::class, 'get'])->name('api.user.get');
//Route::post('/user/{id}', [UserController::class, 'update'])->name('api.user.update');
//Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('api.user.destroy');

//Route::resource('user', UserController::class);
// FIXME:: 30 минут на разработку 1го CRUD'a
// TODO:: 3 минуты на разработку 1го CRUD'a
Route::get("/{model}", [CRUDController::class, 'index'])->name("api.model.index");
Route::post("/{model}", [CRUDController::class, 'create'])->name("api.model.create");
Route::get("/{model}/{id}", [CRUDController::class, 'get'])->name("api.model.get");
Route::post("/{model}/{id}", [CRUDController::class, 'update'])->name("api.model.update");
Route::delete("/{model}/{id}", [CRUDController::class, 'destroy'])->name("api.model.destroy");

// EXTRA REQUEST
// USER
    Route::post('/user/changePassword', [UserController::class, 'changePassword'])->name('api.user.changePassword');

// NOTE
