@extends("layouts.app")
@section("content")

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" style="color: rgb(247, 31, 31)">削除済み商品</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        </ul>
      </div>
    </div>
  </nav>
</header>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        削除済み 商品一覧
      </div>
      <div class="card-body">
        <div class="text">
          <a href="{{ url('todos') }}" class="btn btn-primary">戻る</a>
          </div>
          <br>
          <div class="table">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>タイトル</th>
                  <th>画像</th>
                  <th>価格</th>
                  <th>内容</th>
                  <th>出品予定だった日程</th>
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
                  <td>{{ $todo->id }}</td>
                  <td>{{ $todo->title }}</td>
                  <td>
                    @if ($todo->image)
                    <img src="{{ asset('storage/'.$todo->image) }}" alt="{{ $todo->title }}" width="100">
                    @endif
                  </td>
                  <td>{{ $todo->price }}</td>
                  <td>{{ $todo->description }}</td>
                  <td style="color:rgb(248, 178, 0)">{{ $todo->schedule_at }}</td>
                  <td style="color:rgba(255, 0, 0, 0.64)">{{ $todo->delete_schedule }}</td>
                  <td>
                    {{-- <a href="{{ url('todos/restore/'.$todo->id) }}" class="btn btn-primary" id="restore">復元</a> --}}
                  <a href="#" class="btn btn-primary" id="restore-confirm" data-id="{{ $todo->id }}">復元</a>
                  <a href="{{ url('todos/restore/'.$todo->id) }}" class="btn btn-primary hide" id="restore-real-{{ $todo->id }}">復元</a>
                    <script>
                      const restoreConfirmButtons = document.querySelectorAll('.btn-primary#restore-confirm'); 
                      restoreConfirmButtons.forEach(button => {
                      button.addEventListener('click', function(event) {
                      event.preventDefault(); // デフォルトのリンク動作を抑制
                      
                      const restoreRealButtonId = `restore-real-${button.dataset.id}`; // data-id 属性を使用して、対応する "restore-real" ボタンの ID を取得
                      const restoreRealButton = document.getElementById(restoreRealButtonId);
                      
                      if (confirm('この商品データを復元しますか？')) {
                      restoreRealButton.click(); // 実際の "restore-real" ボタンをクリック
                      }
                      });
                      });
                    </script>
                  </td>
                  <td>
                  {{-- <form action="{{ route('todos.breake', $todo->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">完全削除</button>
                  </form> --}}
                  {{-- <a href="{{ url('todos/break/' .$todo->id) }}" class="btn btn-danger">完全削除</a>
                </td> --}}
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endsection