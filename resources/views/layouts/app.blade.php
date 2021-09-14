<?php
$month = date('n') - 1;
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>支払いチェッカー</title>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ asset('/home') }}">
                        <img src="{{ asset('/img/logo.png') }}" alt="支払いチェッカー" height="80">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="hum_title font-weight-bold">メニュー</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item py-3">
                                <a class="nav-link active" aria-current="page" href="{{ asset('/home') }}">いるものリスト</a>
                            </li>
                            <li class="nav-item py-3">
                                <a class="nav-link" href="{{ asset('/sum_price') }}">金額入力</a>
                            </li>
                            <li class="nav-item py-3">
                                <a class="nav-link" href="{{ asset('/total_pay').'/'.$month }}">支払い料金</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <p class="copyright text-center">&copy;2021 yosuke yano</p>
        </div>
    </footer>
</body>

</html>