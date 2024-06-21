@extends("layouts.app")
@section("content")

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" style="color: rgb(208, 193, 26)">出品予約編集</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          </li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        出品予約商品一覧
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <a href="{{ url('todos') }}" class="btn btn-primary mb-3">戻る</a>
        <a href="{{ url('schedule/create') }}" class="btn btn-warning mb-3">出品予約登録</a>
        <div class="table">
          <table class="table">
            <thead>
              <tr>
                <th>公開／非公開</th>
                <th>ID</th>
                <th>タイトル</th>
                <th>画像</th>
                <th>価格</th>
                <th>内容</th>
                <th>在庫</th>
                <th>出品予約日程</th>
                <th>公開期限</th>
                <th></th>
                <th></th>
              </tr>
              <style>
                .hide {
                  display: none;
                }
              </style>
            </thead>
            <tbody>
              @foreach($todos as $todo)
              <tr>
                <td>{{ $todo->publish_or_unpublish ? '公開' : '非公開' }}</td>
                <td>{{ $todos->firstItem() + $loop->index }}</td>
                <td>{{ $todo->title }}</td>
                <td>
                  @if($todo->image)
                    <img src="{{ asset('storage/' . $todo->image) }}" alt="{{ $todo->title }}" style="width: 100px; height: 100px;">
                  @endif
                </td>
                <td>{{ $todo->price }} 円</td>
                <td>{{ $todo->description }}</td>
                <td>{{ $todo->stock ? '有り' : '無し' }}</td>
                <td style="color:rgb(248, 178, 0)">{{ $todo->schedule_at }}</td>
                <td style="color:rgba(255, 0, 0, 0.64)">{{ $todo->delete_schedule }}</td>
                <td>
                  <a href="{{ url('schedule/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a>
                </td>
                <td>
                  <form method="POST" action="/schedule/{{ $todo->id }}/index">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" data -id="{{ $todo->id }}" id="trash">削除</button>
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
</div>
<style>
    .pagination {
        display: flex;
        justify-content: center;
    }
</style>
@endsection
