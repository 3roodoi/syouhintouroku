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
                {{-- class="form-horizontal" はレイアウトを 横並び に設定するためのクラス--}}
                    @csrf
                    {{-- Laravel Blade テンプレートエンジンにおける CSRFトークン を挿入するためのディレクティブ、クロスサイトリクエストフォージェリ（CSRF）攻撃 からアプリケーションを保護することができる --}}
                    @method('PUT')
                    {{-- @method ディレクティブによって送信されるHTTPメソッドは PUT に変更されます。 --}}
                    <div class="form-group">
                        <label for="id" class="control^label">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {{-- <div class="form-group"> タグは、フォーム要素を囲むように配置します。 --}}
                        <label for="title" class="control-label">タイトル</label>
                        <input class="form-control" name="title" type="text" value="{{ $todo->title }}">
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
