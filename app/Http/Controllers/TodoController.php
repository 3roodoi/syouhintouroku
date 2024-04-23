<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * ▪️git checkout
     */
public function index()
{
    $todos = Todo::all();

    return view('todo.index', compact('todos'));
}

// 登録画面
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

        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を登録しました!'
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


// 編集画面
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

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $todo->image = $imagePath;  //画像
        }
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
}

// $todo = Todo::find($id); の意味
// Laravel フレームワークにおける Eloquent ORM を使用して、データベース から Todo エントリ を検索し、
// その結果を $todo 変数に格納するものです。

// 詳細な説明
// Todo: これは、Todo モデルを表すクラスです。このクラスは、データベースの todos テーブルと関連付けられています。
// ::find: これは、Eloquent ORM における静的メソッドです。このメソッドは、主キー値を使用して、データベースからレコードを検索します。
// ($id): これは、検索する Todo エントリの主キー値を指定するための引数です。
// $todo: これは、検索結果を格納するための変数です。この変数には、Todo インスタンスが格納されます。

