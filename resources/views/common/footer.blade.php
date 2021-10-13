<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>LaravelMarket</title>
</head>
<footer id="common-footer">
    <div class="pc-footer">
        <nav id="footer-wrap">
            <div class="footer-copyright">
                © 2021-2021 YKW Inc.
            </div>
        </nav>
    </div>
    <div class="mobile-footer">
        <div class="inner-block">
            <div class="area">
                <ul class="footer-wrap">
                    <li class="footer-btn-wrap">
                        <a class="home-btn" href="#">
                            <img src=" {{ asset('assets/images/home.png') }}" class="logo">
                        </a>
                        <a class="mypage-btn" href="#">
                            <img src=" {{ asset('assets/images/mypage.png') }}" class="logo">
                        </a>
                        <a class="cart-btn" href="#">
                            <img src=" {{ asset('assets/images/cart.png') }}" class="logo">
                            <span class="navCartIcon">0</span>
                        </a>
                        <a class="other-btn" href="#">
                            <img src=" {{ asset('assets/images/other.png') }}" class="logo">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

