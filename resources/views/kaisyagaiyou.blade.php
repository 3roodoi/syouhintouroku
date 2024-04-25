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
        <!-- <header></header> -->
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

    <main>
        <section class="company-info">
            <h2>店舗概要</h2>
            <h3>社名　　　　大土井商店</h3>
            <h3>所在地　　　〒815-0075 福岡県福岡市南区長丘1丁目20-10</h3>
            <h3>創業　　　　平成18年5月</h3>
            <h3>代表　　　　大土井 慎一</h3>
            <h3>営業時間　　10:00〜19:00</h3>
            <!-- <h3>電話番号　　092-552-7888</h3> -->
            <a href="tel:0925527888" class="phone-link">電話番号　　092-552-7888</a>
        </section>

        <section class="access">
            <h2>アクセス</h2>
            <a href="https://www.google.com/maps/place/〒815-0075+福岡県福岡市南区長丘1丁目">地図はこちら</a>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.020960024548!2d130.39437797452538!3d33.55283174393763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541915a40877745%3A0xf8d379ecf1c7e511!2z5aSn5Zyf5LqV5ZWG5bqX!5e0!3m2!1sja!2sjp!4v1710924769855!5m2!1sja!2sjp"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>
        </section>
    </main>

    <footer>
        <div class="container">
            <img src="img/2長方形ロゴ.png" alt="問い合わせ先">
            <p>&copy; 2024 大土井商店公式ホームページ</p>
        </div>
    </footer>
</body>

</html>
