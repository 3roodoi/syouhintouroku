<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
  /**
   *  ▪️git checkout
   */
  public function index()
  {
    $todos = Todo::where(function ($query) {
      $query->whereNull('schedule_at')
      ->orWhere('schedule_at', '<=', now());
    })
    ->where('publish_or_unpublish', 1) // 公開商品のみ取得
    ->paginate(4);

    return view('todo.index', compact('todos'));
  }

  /**
   * 登録画面
   */
  public function create()
  {
    return view('todo.create');
  }

  public function store(Request $request)
  {
    $todo = new Todo();
    $todo->title = $request->input('title');  //商品名

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $todo->image = $imagePath;  //商品画像
    }
    $todo->description = $request->input('description');  //商品説明
    $todo->price = $request->input('price');  //価格
    $todo->stock = $request->input('stock', false);  //在庫   
    $deleteSchedule = $request->input('delete_schedule');
    $todo->delete_schedule = $deleteSchedule;
    $todo->publish_or_unpublish = $request->input('publish_or_unpublish', true);  //公開／非公開   
    $todo->save();

    return redirect('todos')->with('status', $todo->title . 'を登録しました!'
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $todo = Todo::find($id);

    return view('todo.show', compact('todo'));
  }

  /**
   * 編集画面
   */
  public function edit(string $id)
  {
    $todo = Todo::find($id);
    return view('todo.edit', compact('todo'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $todo = Todo::find($id);
    $todo->title = $request->input('title');  //商品名
    $todo->stock = $request->input('stock');  //在庫
    $todo->price = $request->input('price');  //価格
    $todo->description = $request->input('description');  //商品説明
    $todo->publish_or_unpublish = $request->input('publish_or_unpublish');

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $todo->image = $imagePath;  //画像
    }
    $deleteSchedule = $request->input('delete_schedule');
    $todo->delete_schedule = $deleteSchedule;
    $todo->save();

    return redirect('todos')->with(
      'status',
      $todo->title . 'を更新しました!'
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $todo = Todo::find($id);
    $todo->delete();

    return redirect('todos')->with(
      'status',
      $todo->title . 'を削除しました!'
    );
  }

  public function trash()
  {
    $todos = Todo::onlyTrashed()->whereNotNull('deleted_at')->get();
    return view('trash.deleted', compact('todos'));
  }

  public function restore(string $id)
  {
    $todos = Todo::onlyTrashed()->findOrFail($id);
    $todos->restore();
    return redirect('todos')->with(
      'status',
      $todos->title . '復元しました！'
    );
  }

  public function break(string $id)
  {
    $todos = Todo::onlyTrashed()->findOrFail($id);
    $todos->forceDelete();
    return redirect('todos')->with(
      'status',
      $todos->title . '完全に削除しました！'
    );
  }
}
