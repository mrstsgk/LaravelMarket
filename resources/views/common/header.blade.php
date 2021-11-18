<!DOCTYPE html>
<html lang="ja">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    {{-- CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    {{-- local --}}
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <title>LaravelMarket</title>
</head>

<body>
    <header id="common-haeder">
        <div class="pc-header">
            <nav id="header-wrap">
                <div class="wrap-item">
                    <a href="{{ route('showList') }}">
                        <img src=" {{ asset('assets/images/logo.png') }}" class="header-logo">
                    </a>
                </div>
                <div class="wrap-item">
                    <form action="#" method="post" class="header-form">
                        <input type="search" name="search" class="header-search-box" placeholder="キーワードを入力してください">
                        <button type="submit" class="header-serch-btn">検索</button>
                    </form>
                </div>
                <div class="wrap-item">
                    <ul class="header-ul">
                        <li>
                            <a href="/login" class="list-item"><i
                                    class="fas fa-user"></i>{{ $userName }}様</a>
                        </li>
                        <li class="cart">
                            <a href="#" class="list-item"><i class="fas fa-shopping-cart"></i>カート</a>
                            <span class="navCartIcon">0</span>
                        </li>
                        <li>
                            <a href="#" class="list-item"><i class="fas fa-history"></i>注文履歴</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="mobile-header">
            <form action="#" method="post" class="mobile-form">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="キーワードを入力してください">
                    <button class="btn btn-outline-secondary" type="button">検索</button>
                </div>
            </form>
        </div>
    </header>
