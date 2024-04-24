<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('todos', [TodoController::class, 'index']);
Route::get('todos/create', [TodoController::class, 'create']);
Route::post('todos', [TodoController::class, 'store']); //データベースに情報を登録、保存する
Route::get('todos/{id}', [TodoController::class, 'show']);
Route::get('todos/{id}/edit', [TodoController::class, 'edit']);
Route::put('todos/{id}', [TodoController::class, 'update']);
Route::delete('todos/{id}', [TodoController::class, 'destroy']);

// Route::get('todos', [CustomAuthController::class, 'todos']); //dashboardから変更２箇所
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'register'])->name('register-user'); //registration から変更
Route::post('custom-register', [CustomAuthController::class, 'customRegister'])->name('register.custom'); //customRegistration customRegistrationから変更
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
