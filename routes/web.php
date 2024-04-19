<?php

use Illuminate\Support\FacadesR\oute;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', [TodoController::class, 'index']);
Route::get('todos/create', [TodoController::class, 'create']);
Route::post('todos', [TodoController::class, 'store']); //データベースに情報を登録、保存する
Route::get('todos/{id}', [TodoController::class, 'show']);
Route::get('todos/{id}/edit', [TodoController::class, 'edit']);
Route::put('todos/{id}', [TodoController::class, 'update']);
Route::delete('todos/{id}', [TodoController::class, 'destroy']);
