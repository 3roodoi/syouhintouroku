@extends("layouts.app")
@section("content")
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        編集画面
      </div>
      <div class="card-body">
        <form method="POST" action="/schedule/{{ $todo->id }}/index" class="form-horizontal" enctype="multipart/form-data">
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
          <div class="form-group">
            <label for="schdule_at" class="control-label">出品予定日程</label>
            <input type="datetime-local" class="form-control" id="schedule_at" name="schedule_at" value="{{ old('schedule_at', $todo->schedule_at ?? '') }}" style="width: 12%">
            <br>
          </div>
          <div class="form-group">
            <label for="delete_schedule">公開期限</label>
            <br>
            <input type="datetime-local" id="delete_schedule" name="delete_schedule" value="{{ $todo->delete_schedule }}">
          </div>
          <br>
          <div class="form-group">
            <label for="publish_or_unpublish" class="control-label">公開／非公開</label>
            <br>
            <input type="radio" name="publish_or_unpublish" value="1" {{$todo->publish_or_unpublish ? 'checked':''}}> 公開
            <input type="radio" name="publish_or_unpublish" value="0" {{!$todo->publish_or_unpublish ? 'checked':''}}> 非公開
            </p>
            <br>
          </div>
          <hr>
          <button class="btn btn-primary" type="submit">更新</button>
          <a href="{{ url('schedule/index')}}" class="btn btn-info">戻る</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection