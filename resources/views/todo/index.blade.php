@extends("layouts.app")
@section("content")
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
                <a href="{{ url('todos/create') }}" class="btn btn-success mb-3">登録</a>
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
                            <span aria-hidden="true">前に</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $todos->lastPage(); $i++)
                        <li class="page-item {{ ($todos->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $todos->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ $todos->nextPageUrl() }}">
                                <span aria-hidden="true">次に</span>
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

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color:rgb(26, 129, 248);">
        <div class="container">
            <a class="navbar-brand mr-auto" href="todos" style="color: white;">出品編集ページ</a>
            <div class="navbar-nav ml-auto" style="display: flex; justify-content: flex-end;">
                {{-- <div class="navbar-nav ml-auto"> --}}
                    @guest
                    @else
                    <div class="navbar-nav style=display: flex; justify-content: flex-end;">
                        <a class="nav-link" href="{{ route('register-user') }}" style="color: white">新規ユーザー登録</a>
                        <a class="nav-link" href="{{ route('signout') }}" style="color: white">ログアウト</a>
                    </div>
                    @endguest
                </div>
                </button>
            </div>
    </nav>
</body>
