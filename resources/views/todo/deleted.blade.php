@extends("layouts.app")
@section("content")

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" style="color: rgb(31, 114, 247)">商品編集画面</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('register-user') }}">新規ユーザー登録</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signout') }}">ログアウト</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="商品検索" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        削除済み 商品一覧
      </div>
      <div class="card-body">
        <a href="{{ url('todos')}}" class="btn btn-info mb-3">戻る</a>

        @if ($todos->count() > 0)
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>タイトル</th>
              <th>画像</th>
              <th>価格</th>
              <th>内容</th>
              <th>完了フラグ</th>
              <th>削除日時</th>
              <th>復元</th>
              <th>完全削除</th>
            </tr>
          </thead>
          <tbody>
            @foreach($todos as $todo)
            <tr>
              <td>{{ $trash->id }}</td>
              <td>{{ $trash->title }}</td>
              <td>
                @if ($trash->image)
                <img src="{{ asset('storage/' . $trash->image) }}" alt="{{ $trash->title }}" width="100">
                @endif
              </td>
              <td>{{ $trash->price }}</td>
              <td>{{ $trash->description }}</td>
              <td>{{ $trash->completed ? '完了' : '未完了' }}</td>
              <td>{{ $trash->deleted_at }}</td>
              <td>
                <a href="{{ route('todos.restore', $trash->id) }}" class="btn btn-primary">復元</a>
              </td>
              <td>
                <form action="{{ route('todos.destroy', $trash->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">完全削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
      @else
      <p style="text-align: center">ゴミ箱は空です。</p>
      </table>
      @endif

      <style>
        .pagination {
          display: flex;
          justify-content: center;
        }
      </style>
      @endsection