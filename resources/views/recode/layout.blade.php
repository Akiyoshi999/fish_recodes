<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブログ</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">ブログ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">ブログ一覧 <span class="sr-only"></span></a>
                    <a class="nav-item nav-link" href="#">ブログ投稿</a>
                </div>
            </div>
        </nav </header>
        <br>
        <div class="container">
            @yield('content')

        </div>
        <footer class="footer bg-dark  fixed-bottom">
            <div class="container text-center">
                <span class="text-light">©︎福のプログラミング講座</span>
            </div>
        </footer>
</body>

</html>