@include('common.header')
<link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">
<div class="title">
    <h1>マイページ</h1>
</div>

<div class="member-info">
    <div class="member-name">
        <p>{{ $userName }}さん</p>
    </div>
    <div class="member-point">
        <p>利用可能ポイント</p>
        <ul>
            <li><p><span>0</span>ポイント</p></li>
            <li><p>(付与率 1.0%)</p></li>
        </ul>
        <p>有効期限 (2025/12/31)</p>
    </div>
</div>
<div class="mypage-menu">
    <div class="coupon">
        <a href="#" class="">
            <img src=" {{ asset('assets/images/coupon.png') }}" class="coupon-logo">
            <p>クーポン</p>
        </a>
        
    </div>
</div>
@include('common.footer')