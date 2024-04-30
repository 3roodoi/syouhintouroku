@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form method="POST" action="/todos/{{ $todo->id }}" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id" class="controllabel">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="title" class="control-label">商品名</label>
                        <input class="form-control" name="title" type="text" value="{{ $todo->title }}" maxlength="50" required>
                        <small class="form-text text-muted">50文字以内で入力してください。
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="image" class="control-label">商品画像</label>
                        <input class="form-control" name="image" type="file">
                        @if ($todo->image)
                        <img src="{{ asset('storage/' . $todo->image) }}" alt="{{ $todo->title }}"
                            style="width: 300px; height: 300px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">価格</label>
                        <input class="form-control" name="price" type="number" value="{{ $todo->price }}" maxlength="20" required>
                        <small class="form-text text-muted">半角数字で入力してください。</small>
                    </div>

                    <div class="form-group">
                      <label for="title" class="control-label">商品説明</label>
                      <input class="form-control" name="description" type="text" value="{{ $todo->description }}">
                    </div>
                      <small class="form-text text-muted">300文字以内で入力してください。</small>

                    <br>
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
                    <a href="{{ url('todos')}}" class="btn btn-info">戻る</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
