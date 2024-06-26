@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                詳細画面
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>id</th>
                            <td>{{$todo->id}}</td>
                        </tr>
                        <tr>
                            <th>title</th>
                            <td>{{$todo->title}}</td>
                        </tr>
                        <tr>
                            <th>画像</th>
                            <td>
                                @if($todo->image) <img src="{{ asset('storage/' . $todo->image) }}" alt="{{ $todo->title }}" style="width: 25%; height: 25%;">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>価格</th>
                            <td>{{$todo->price}} 円</td>
                        </tr>
                        <tr>
                            <th>商品説明</th>
                            <td>{{$todo->description}} </td>
                        </tr>

                        <tr>
                            <th>在庫</th>
                            <td>{{$todo->stock ? '有り':'無し'}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ url('todos')}}" class="btn btn-info">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
