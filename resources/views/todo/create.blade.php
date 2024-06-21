@extends("layouts.app")
@section("content")

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        登録画面
      </div>
      <div class="card-body">
        <form method="POST" action="/todos" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title" class="control-label">商品名</label>
            <input class="form-control" name="title" type="text" maxlength="50" required>
            <small class="form-text text-muted">50文字以内で入力してください。
            </small>
          </div>
          <div class="form-group">
            <label for="image" class="control-label">商品画像</label>
            <input class="form-control" name="image" type="file" required>
          </div>
          <div class="form-group" style="margin-bottom: 30px">
            <label for="price">価格</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" maxlength="20" required>
            <small class="form-text text-muted">半角数字で入力してください。</small>
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">商品説明</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="textarea" rows="5" name="description" maxlength="300" required>
            </textarea>
            <small class="form-text text-muted">300文字以内で入力してください。</small>
          </div>
          <div class="form-group">
            <label for="stock" class="control-label">在庫</label>
            <br>
            <input type="radio" name="stock" value="1"> 有り
            <input type="radio" name="stock" value="0"> 無し
            <br>
          </div>
          <div class="form-group">
            <label for="delete_schedule">公開期限</label>
            <input type="datetime-local" id="delete_schedule" name="delete_schedule" class="form-control" style="width: 10%">
          </div>
          <div class="form-group">
            <label for="publish_or_unpublish" class="control-label">公開／非公開</label>
            <br>
            <input type="radio" name="publish_or_unpublish" value="1"> 公開
            <input type="radio" name="publish_or_unpublish" value="0"> 非公開
            </p>
            <br>
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
          <a href="{{ url('todos')}}" class="btn btn-info">戻る</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
