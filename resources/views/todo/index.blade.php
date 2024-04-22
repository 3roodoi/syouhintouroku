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
@endsection
