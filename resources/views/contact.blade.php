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

    <section id="contact" class="contact-section">

        <div class="container">
            <h2>お問い合わせ</h2>
            <p>ご質問やご要望がございましたら、以下のフォームからお気軽にお問い合わせください。</p>

            <div class="card-body">
                <form method="POST" action="submit.php" enctype="multipart/form-data">
                    {{-- <form action="submit.php" method="post"> --}}
                        <div class="form-group">
                            <label for="name">　お名前:</label>
                            {{-- <input type="text" id="name" name="name" required> --}}
                            <input class="form-control" name="title" type="text" required>
                        </div>

                        <label for="email">　メールアドレス:</label>
                        <div class="form-group mb-3">
                            <input type="text" name="email" required autofocus>
                        </div>
                        <label for="message">　メッセージ:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <button onclick="sendEmail()">お問い合わせを送信</button>
                    </form>
            </div>
    </section>

    <footer>
        <div class="container">
            <img src="img/2長方形ロゴ.png" alt="問い合わせ先">
            <p>&copy; 2024 大土井商店公式ホームページ</p>
        </div>
    </footer>
</body>

</html>
