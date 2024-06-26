<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ScheduleTodoController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RegisterTodoController;
use App\Http\Controllers\UnpublishedTodoController;

Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/register', function () {
  return view('auth.register');
});

Route::get('todos', [TodoController::class, 'index']);
Route::get('todos/create', [TodoController::class, 'create']);
Route::post('todos', [TodoController::class, 'store']);
Route::get('todos/{id}', [TodoController::class, 'show']);
Route::get('todos/{id}/edit', [TodoController::class, 'edit']);
Route::put('todos/{id}', [TodoController::class, 'update']);
Route::delete('todos/{id}', [TodoController::class, 'destroy']);
Route::get('deleted', [TodoController::class, 'trash']);
Route::get('todos/restore/{id}', [TodoController::class, 'restore']);
Route::delete('todos/break/{id}', 'TodoController@break')->name('todos.break');

Route::get('unpublish', [UnpublishedTodoController::class, 'index']);
Route::get('/schedule/index', [ScheduleTodoController::class, 'index']);
Route::get('schedule/create', [ScheduleTodoController::class, 'create']);
Route::post('/schedule/index', [ScheduleTodoController::class, 'store']);
Route::get('/schedule/{id}/edit', [ScheduleTodoController::class, 'edit']);
Route::put('schedule/{id}/index', [ScheduleTodoController::class, 'update']);
Route::delete('schedule/{id}/index', [ScheduleTodoController::class, 'destroy']);
Route::get('deleted', [ScheduleTodoController::class, 'trash']);


Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'register'])->name('register-user');
Route::post('custom-register', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/kodawari', function () {
  return view('kodawari');
});

Route::get('/kaisyagaiyou', function () {
  return view('kaisyagaiyou');
});

Route::get('/contact', function () {
  return view('contact');
});


Route::get('/dorayaki_bkwt8', function () {
  return view('items/dorayaki_bkwt8');
});

Route::get('/dorayaki_bkwt16', function () {
  return view('items/dorayaki_bkwt16');
});

Route::get('/cream4', function () {
  return view('items/cream4');
});

Route::get('/cream8', function () {
  return view('items/cream8');
});

Route::get('/matcha_cream4', function () {
  return view('items/matcha_cream4');
});

Route::get('/matcha_cream_cream4', function () {
  return view('items/matcha_cream_cream4');
});
