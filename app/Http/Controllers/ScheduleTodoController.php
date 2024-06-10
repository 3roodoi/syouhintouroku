<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleTodoController extends Controller
{
  /**
   *  ▪️git checkout
   */
  public function index()
  {
    $todos = Todo::where(function ($query) {
      $query->whereNotNull('schedule_at')
      ->where('schedule_at', '>', now());
    })->paginate(4);

    return view('schedule.index', compact('todos'));
  }

  /**
   * 登録画面
   */
  public function create()
  {
    return view('schedule.create');
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
    $todo->schedule_at = $request->input('schedule_at');  //出品予定日時
    $deleteSchedule = $request->input('delete_schedule');  //公開期限
    $todo->delete_schedule = $deleteSchedule; 

    $todo->save();

    return redirect('/schedule/index')->with('status', $todo->title . 'を登録しました!'
    );
  }

  public function edit(string $id)
  {
    $todo = Todo::find($id);
    return view('schedule.edit', compact('todo'));
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
    $todo->schedule_at = $request->input('schedule_at',);  //出品予定日時
    $deleteSchedule = $request->input('delete_schedule');  //公開期限
    $todo->delete_schedule = $deleteSchedule;

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $todo->image = $imagePath;  //画像
    }
    $todo->save();

    return redirect('/schedule/index')->with('status', $todo->title . 'を更新しました!'
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $todo = Todo::find($id);
    $todo->delete();

    return redirect('/schedule/index')->with(
      'status',
      $todo->title . 'を削除しました!'
    );
  }

  public function trash()
  {
    $todos = Todo::onlyTrashed()->whereNotNull('deleted_at')->get();
    return view('trash.deleted', compact('todos'));
  }
}