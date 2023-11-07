<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('news', [\App\Http\Controllers\API\AdminApiController::class, 'indexNews'])->middleware(['auth']);
Route::get('books', [\App\Http\Controllers\API\AdminApiController::class, 'indexBooks'])->middleware(['auth']);
Route::get('usuarios', [\App\Http\Controllers\API\AdminApiController::class, 'indexUsuarios'])->middleware(['auth']);

Route::get('usuarios/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'usuarioId'])->middleware(['auth']);

Route::get('news/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'newId'])->middleware(['auth']);

Route::get('books/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'bookId'])->middleware(['auth']);

Route::post('news', [\App\Http\Controllers\API\AdminApiController::class, 'createNew'])->middleware(['auth']);
Route::post('books', [\App\Http\Controllers\API\AdminApiController::class, 'createBook'])->middleware(['auth']);


Route::put('news/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'updateNew'])->middleware(['auth']);
Route::delete('news/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'deleteNew'])->middleware(['auth']);

Route::put('books/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'updateBook'])->middleware(['auth']);
Route::delete('books/{id}', [\App\Http\Controllers\API\AdminApiController::class, 'deleteBook']);


