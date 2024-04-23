<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>商品登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-3">
        <a class="navber-brand" href="{{ url("http://localhost/todos") }}">商品登録</a>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

{{-- ページネーション --}}
<div style="margin: 1%;">
    <table id="container" class="table table-sm table-bordered" style="width: 500px;"></table>
    <nav class="pagination-container"><ul class="pagination" id="pagination"></ul></nav>
</div>

<script>
    // ページ数を取得
    var page = Number(getQueryParam('page'));
    if (page < 1) page = 1;

    count = 1015;
    perPage = 20;
    maxPage = Math.ceil(count / perPage) // 51

    // ページネーション
    html = '';
    if (page > 1) {
        html += `<li class="page-item"><a class="page-link" href="?page=${page - 1}">前へ</a></li>`;
    }
    for (i = page - 2; i <= page + 2 && i <= maxPage; i++) {
        if (i < 1) continue;
        if (i == page) {
            html += `<li class="page-item active"><a class="page-link" href="?page=${i}">${i}</a></li>`;
            continue;
        }
        html += `<li class="page-item"><a class="page-link" href="?page=${i}">${i}</a></li>`;
    }
    if (page != maxPage) {
        html += `<li class="page-item"><a class="page-link" href="?page=${page + 1}">次へ</a></li>`
    }
    document.getElementById('pagination').innerHTML = html;

    // URLから指定したパラメータを取得
    function getQueryParam($key) {
        if (1 < document.location.search.length) {
            var query = document.location.search.substring(1);
            var parameters = query.split('&');
            for (var i = 0; i < parameters.length; i++) {
                // パラメータ名とパラメータ値に分割する
                var element = parameters[i].split('=');
                if (element[0] == $key) return element[1];
            }
        }
        return null;
    }
</script>
    <style>
        .pagination-container {
        display: flex;
        justify-content: center;
        }
    </style>
</body>
