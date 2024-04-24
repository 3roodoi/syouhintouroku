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
                            <th>id</th>
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
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>
                                @if($todo->image)
                                    <img src="{{ asset('storage/' . $todo->image) }}" alt="{{ $todo->title }}" style="width: 100px; height: 100px;">
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
    </div>
</div>


                {{-- ページネーション --}}
                <div style="margin: 1%;">
                    <table id="container" class="table table-sm table-bordered" style="width: 500px;"></table>
                    <nav class="pagination-container"><ul class="pagination" id="pagination"></ul></nav>
                </div>
                <script>
                    // ページ数を取得
                    var page = Number(getQueryParam('page'));
                    if (page < 1) page = 1;

                    count = 1015;
                    perPage = 20;
                    maxPage = Math.ceil(count / perPage) // 51


                                            // ページネーション
                    html = '';
                    if (page > 1) {
                        html += `<li class="page-item"><a class="page-link" href="?page=${page - 1}">前へ</a></li>`;
                    }
                    for (i = page - 2; i <= page + 2 && i <= maxPage; i++) {
                        if (i < 1) continue;
                        if (i == page) {
                            html += `<li class="page-item active"><a class="page-link" href="?page=${i}">${i}</a></li>`;
                            continue;
                        }
                        html += `<li class="page-item"><a class="page-link" href="?page=${i}">${i}</a></li>`;
                    }
                    if (page != maxPage) {
                        html += `<li class="page-item"><a class="page-link" href="?page=${page + 1}">次へ</a></li>`
                    }
                    document.getElementById('pagination').innerHTML = html;



                                                // URLから指定したパラメータを取得
                    function getQueryParam($key) {
                        if (1 < document.location.search.length) {
                            var query = document.location.search.substring(1);
                            var parameters = query.split('&');
                            for (var i = 0; i < parameters.length; i++) {
                                // パラメータ名とパラメータ値に分割する
                                var element = parameters[i].split('=');
                                if (element[0] == $key) return element[1];
                            }
                        }
                        return null;
                    }
                </script>

                    <style>
                        .pagination {
                        display: flex;
                        justify-content: center;
                        }
                    </style>

@endsection




