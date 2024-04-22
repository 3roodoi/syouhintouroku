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
                        <input class="form-control" name="title" type="text">
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">商品画像</label>
                        <input class="form-control" name="image" type="file">
                    </div>

                    <div class="form-group">
                        <label for="stock" class="control-label">在庫</label>
                        <br>
                            <input type="radio" name="stock" value="1"> 有り
                            <input type="radio" name="stock" value="0"> 無し
                            </p>
                        <br>
                    </div>
                    {{-- <div class="form-group">
                        <label for="title" class="control-label">商品名</label>
                        <input class="form-control" name="title" type="text">
                    </div> --}}
                    <button class="btn btn-primary" type="submit">登録</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
