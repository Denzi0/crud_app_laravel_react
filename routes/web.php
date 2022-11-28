<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class , 'index']);
Route::post('/todos', [TodoController::class, 'store']);

Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('id.destroy');

Route::delete('/removeTodo', [TodoController::class, 'destroyAll']);

Route::get('/todos/edit/{id}', [TodoController::class, 'edit']);
Route::get('/todos/update/{id}', [TodoController::class, 'update']);


