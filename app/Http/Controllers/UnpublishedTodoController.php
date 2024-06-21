<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class UnpublishedTodoController extends Controller
{
  public function index()
  {
    $todos = Todo::where('publish_or_unpublish', 0)->get();
    return view('todo.unpublish', compact('todos'));
  }

}