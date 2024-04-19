@extends("layouts.app")
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                登録画面
            </div>
            <div class="card-body">
                <form method="POST" action="/todos">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label">商品名</label>
                        <input class="form-control" name="title" type="text">
                    </div>
                    <div class="form-group">
                        <label for="syouhinimg" class="control-label">商品画像</label>
                        {{-- forを変更 --}}

                            <div id="dragDropArea">
                                <div class="drag-drop-inside">
                                    <p class="drag-drop-info">ここにファイルをドロップ</p>
                                    <i class="bi bi-image"></i>
                                    <!--商品一覧ページにinput するコードが必要 -->
                                    <p class="drag-drop-buttons">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </p>
                                    <div id="previewArea"></div>
                                </div>
                            </div>

                        {{-- <input class="form-control" name="title" type="img"> --}}
                        {{-- 上記が入力フォームを表示する コード --}}
                        {{-- 下記に商品画像登録のcss を登録 --}}
                        <style>
                            #dragDropArea{
                            background-color: #f4f4f4;
                            margin: 10px;
                            padding: 10px;
                            border: #ddd dashed 5px;
                            min-height: 200px;
                            text-align: center;
                            }
                            #dragDropArea p{
                                color: #999;
                                font-weight: bold;
                                font-size: 14px;
                                font-size: 1.4em;
                            }
                            #dragDropArea .drag-drop-buttons{
                                margin-top: 20px;
                                font-size: 12px;
                                font-size: 1.2em;
                            }
                            .drag-drop-buttons input{
                                margin: auto;
                            }
                        </style>
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
