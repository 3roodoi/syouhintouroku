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

    <div class="container">
        <section id="products" class="products-section">
            <h2>商品紹介</h2>
            <ul>
                <li>
                    <a href="{{ url('/dorayaki_bkwt8') }}">
                        <img src="/img/【商品】どらやき8個.jpg" width="400" height="400" alt="どら焼き8個">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/dorayaki_bkwt16') }}">
                        <img src="../img/【商品】どらやき16個.jpg" width="400" height="400" alt="どら焼き16個">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/cream4') }}">
                        <img src="../img/【商品】クリーム小豆4個.jpg" width="400" height="400" alt="クリーム小豆4個">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/cream8') }}">
                        <img src="../img/【商品】クリーム小豆8個.jpg" width="400" height="400" alt="クリーム小豆8個">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/matcha_cream4') }}">
                        <img src="../img/【商品】抹茶4個.jpg" width="400" height="400" alt="抹茶4個">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/matcha_cream_cream4') }}">
                        <img src="../img/【商品】クリームどら焼き4個.jpg" width="400" height="400" alt="クリームどら焼き4個">
                    </a>
                </li>
            </ul>
        </section>
    </div>

    <footer>
        <div class="container">
            <img src="img/2長方形ロゴ.png" alt="問い合わせ先">
            <p>&copy; 2024 大土井商店公式ホームページ</p>
        </div>
    </footer>

    <div class="container" style="text-align:center; color:black;">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('login') }}" style="color: black">管理者ログイン</a>

            </div>
        </div>
    </div>


</body>

</html>
