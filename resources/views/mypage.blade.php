@include('common.header')
<link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">

<div class="mypage">
    <div class="title">
        <img src=" {{ asset('assets/images/mypage.png') }}">マイページ
    </div>
    <div class="member-info">
        <div class="member-name">
            <p>{{ $userName }}さん</p>
        </div>
        <div class="member-point">
            <p class="point-tag">利用可能ポイント</p>
            <p class="point"><span>0</span>ポイント <span>(付与率 1.0%)</span></p>
            <p class="point-limit">有効期限 (2025/12/31)</p>
        </div>
    </div>
    <hr>
    <div class="mypage-menu">
        <div class="coupons">
            <!-- 折り畳み展開ポインタ -->
            <div class="coupon-btn" onclick="obj=document.getElementById('coupon-open').style; obj.display=(obj.display=='none')?'block':'none';">
                <a style="cursor:pointer;">
                    <img src=" {{ asset('assets/images/coupon.png') }}" class="coupon-image">
                </a>
                <p>所持クーポン</p>
            </div>
            <!--// 折り畳み展開ポインタ -->
                
                <!-- 折り畳まれ部分 -->
                <div id="coupon-open" style="display:none;clear:both;">
                    
                    @foreach ($coupons as $coupon)
                        <div class="coupon">
                            <p>{{ $coupon->coupon_name }}</p>
                            @if ($coupon->type == "1")
                                <p>{{ $coupon->discount }}円引き</p>
                            @elseif ($coupon->type == "2")
                                <p>{{ $coupon->discount }}％引き</p>
                            @endif
                            <p>{{ $coupon->deadline }}まで</p>
                        </div>
                    @endforeach
                
                </div>
                <!--// 折り畳まれ部分 -->
        </div>
    </div>

</div>

@include('common.footer')