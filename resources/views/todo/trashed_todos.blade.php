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
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <a href="{{ url('trashed_todos') }}" class="btn btn-danger mb-3">削除済み</a>
        <a href="{{ url('todos')}}" class="btn btn-info mb-3">戻る</a>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>商品名</th>
              <th>商品画像</th>
              <th>価格</th>
              <th>商品説明</th>
              <th>在庫</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          {{-- <tbody>

            @foreach($todos as $todo)
            <tr>
              <td>{{ $todos->firstItem() + $loop->index }}</td>
              <td>{{ $todo->title }}</td>
              <td>
                @if($todo->image)
                <img src="{{ asset('storage/' . $todo->image) }}" alt="{{ $todo->title }}"
                  style="width: 100px; height: 100px;">
                @endif
              </td>
              <td>{{ $todo->price }} 円</td>
              <td>{{ $todo->description }}</td>
              <td>
                <form method="POST" action="/todos/{{ $todo->id }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
    <div class="mt-3">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="{{ $todos->previousPageUrl() }}">
              <span aria-hidden="true">前へ</span>
            </a>
          </li>
          @for ($i = 1; $i <= $todos->lastPage(); $i++)
            <li class="page-item {{ ($todos->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $todos->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item">
              <a class="page-link" href="{{ $todos->nextPageUrl() }}">
                <span aria-hidden="true">次へ</span>
              </a>
            </li>
        </ul>
      </nav>
    </div>
  </div>
</div> --}}

<style>
  .pagination {
    display: flex;
    justify-content: center;
  }
</style>
@endsection 