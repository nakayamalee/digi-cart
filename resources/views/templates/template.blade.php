<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    @yield('css')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg w-100">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white text-center" aria-current="page"
                                href="/">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/product-index">商品列表</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/customer-center">會員中心</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/cart-index">
                                <i class="bi bi-cart4 position-relative">
                                    <div class="position-absolute border rounded-circle cart-product-count">0</div>
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>

        @yield('js')
</body>

</html>
