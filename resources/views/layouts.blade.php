<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="album.css" rel="stylesheet">
    <link href="../example.css" rel="stylesheet">
</head>

<body>
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
        <div class="container">
            <span class="skiplink-text">Skip to main content</span>
        </div>
    </a>

    <header>
        @include('header')
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <!-- <h1 class="jumbotron-heading">Album example</h1> -->
                <h1 class="jumbotron-heading">アルバムページのサンプル</h1>
                <!-- <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p> -->
                <p class="lead text-muted">釣った魚の記録を残して、釣りの記録を残していきましょう！</p>
                <p>
                    <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a> -->
                    <a href="{{ route('create') }}" class="btn btn-primary my-2">釣果を記録する</a>
                    <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
                    <a href="#" class="btn btn-secondary my-2">サブアクション</a>
                </p>
            </div>
        </section>
        <p class="text-success">{{ session('success_msg') }}</p>
        <p class="text-danger">{{ session('err_msg') }}</p>

        <div class="album py-5 bg-light">
            <div class="container">
                @yield ('content')

            </div>
        </div>

    </main>

    <footer class="text-muted">
        @include('footer')</footer>
    <script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/anchor.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/clipboard.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/bs-custom-file-input.min.js"></script>
    <script src="/docs/4.5/assets/js/src/application.js"></script>
    <script src="/docs/4.5/assets/js/src/search.js"></script>
    <script src="/docs/4.5/assets/js/src/ie-emulation-modes-warning.js"></script>
</body>

</html>