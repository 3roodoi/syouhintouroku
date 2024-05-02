@extends("layouts.app")
@section("javascript")
    <script src="{{ asset('js/todo.js')}}"></script>
@endsection

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
          商品一覧
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

        <body>
          <div class="overlay" id="js-overlay"></div>
          <div class="modal" id="js-modal">
            <div class="modal-close__wrap">
              <button class="modal-close" id="js-close">
                <span></span>
                <span></span>
              </button>
            </div>

            <p>コンテンツ</p>
          </div>
        </body>


        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
            商品登録
        </button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">商品登録</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
              maxlength="20" required>
            <small class="form-text text-muted">半角数字で入力してください。</small>
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">商品説明</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="textarea" rows="5"
              name="description" maxlength="300" required>
                        </textarea>
            <small class="form-text text-muted">300文字以内で入力してください。
            </small>
          </div>

          <div class="form-group">
            <label for="stock" class="control-label">在庫</label>
            <br>
            <input type="radio" name="stock" value="1"> 有り
            <input type="radio" name="stock" value="0"> 無し
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
</div>

<style>
  .pagination {
    display: flex;
    justify-content: center;
  }
</style>
@endsection