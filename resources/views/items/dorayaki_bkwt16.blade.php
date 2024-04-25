<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/正方形ロゴ.png">
    <title>商品紹介 | 大土井商店</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>ようこそ大土井商店へ</h1>
            <h2>
                大土井商店の餡子は自家製です。一級品の北海道十勝産小豆、大手亡を使用し、
            </h2>
            <h2>
                店内の銅窯でじっくりと炊いています。
            </h2>

            <h3>
                <nav>
                    <ul>
                        <li><a href="{{ url('/welcome') }}">商品紹介</a></li>
                        <li><a href="{{ url('/kodawari') }}">こだわりの無添加と自家製餡子</a></li>
                        <li><a href="{{ url('/kaisyagaiyou') }}">店舗概要</a></li>
                        <li><a href="{{ url('/contact') }}">お問い合わせ</a></li>
                    </ul>
                </nav>
        </div>
        </h3>
    </header>

    <style>
        header {
    background-image: url("{{ asset('img/どら焼き.png') }}");
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 5vw 0;
    max-width: 100%;
    height: 100%;
    position: relative;
}

        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
    </style>

    <body>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                adjustOverlayHeight();
                window.addEventListener('resize', adjustOverlayHeight);
            });

            function adjustOverlayHeight() {
                var header = document.querySelector('header');
                var overlay = header.querySelector('::before');
                overlay.style.height = header.offsetHeight + 'px';
            }
        </script>
    </body>

<section class="dorayaki">
    <div>
        <h2>■どら焼き 白黒16個（黒餡8個/白餡8個）</h2>
        <p>
        国産小麦粉を使ったしっかりとした生地に、
        丁寧に炊き上げた餡をぎっしり詰めた博多どら焼きです。
        濃厚な舌ざわりで甘さ控えめ、贈り物にもおすすめです。
        </p>
        <p>2,500円(税込)</p>
    <button>購入する</button>
    </div>
    <div>
    <img src="../img/【商品】どらやき16個.jpg" width="500" height="400" alt="【商品】どらやき16個">
    </div>
</section>

    <footer>
        <div class="container">
            <img src="../img/2長方形ロゴ.png" alt="問い合わせ先">
            <p>&copy; 2024 大土井商店公式ホームページ</p>
        </div>
    </footer>
</body>
</html>

