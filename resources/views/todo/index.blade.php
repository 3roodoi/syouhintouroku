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
      {{-- <form class="d-flex" role="search" >
        <input class="form-control me-2" type="search" placeholder="商品検索" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
      {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </ul>
      </div> --}}
    </div>
  </div>
</nav>
</header>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                商品一覧
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{{ url('todos/create') }}" class="btn btn-success mb-3">商品登録</a>
                <a href="{{ url('deleted') }}" class="btn btn-danger mb-3">削除済み</a>
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
                    <tbody>

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
                            <td>{{ $todo->stock ? '有り' : '無し' }}</td>
                            <td><a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a></td>
                            <td><a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a></td>
                            <td>
                                <form method="POST" action="/todos/{{ $todo->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" data  -id="{{ $todo->id }}" id="trash">削除</button>
                                        <script>
                                            const deleteButtons = document.querySelectorAll('#trash');
                                            
                                            deleteButtons.forEach(button => {
                                            button.addEventListener('click', function(event) {
                                            event.preventDefault(); // デフォルトの送信処理をキャンセル
                                            
                                            const todoId = this.dataset.id; // ボタンの data-id 属性を取得
                                            const confirmationMessage = `商品を削除しますか？`;
                                            
                                            if (confirm(confirmationMessage)) {
                                            // 送信処理を実行
                                            this.parentNode.submit(); // ボタンを含むフォームを送信
                                            }
                                            });
                                            });
                                        </script>
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
</div>

<style>
    .pagination {
        display: flex;
        justify-content: center;
    }
</style>
@endsection
