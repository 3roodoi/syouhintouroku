@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form method="POST" action="/todos/{{ $todo->id }}" class="form-horizontal">
                    @csrf

                    @method('PUT')

                    <div class="form-group">
                        <label for="id" class="controllabel">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {{-- <div class="form-group"> タグは、フォーム要素を囲むように配置します。 --}}
                        <label for="title" class="control-label">タイトル</label>
                        <input class="form-control" name="title" type="text" value="{{ $todo->title }}">
                    </div>

                    <div class="form-group">
                        <label for="stock" class="control-label">在庫</label>
                        <br>
                            <input type="radio" name="stock" value="1" {{$todo->stock ? 'checked':''}}> 有り
                            <input type="radio" name="stock" value="0" {{!$todo->stock ? 'checked':''}}> 無し
                            </p>
                        <br>
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
