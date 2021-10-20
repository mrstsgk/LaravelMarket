@include('common.header')
<section class="hero_slider">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" id="slide_1">
                <img src="{{ asset('assets/images/sale.png') }}" width="100%" height="100%">
                <p>セール祭開催中！</p>
            </div>
            <div class="swiper-slide" id="slide_2">
                <img src="{{ asset('assets/images/headerimg_1.png') }}" width="100%" height="100%">
                <p>全品送料無料</p>
            </div>
            <div class="swiper-slide" id="slide_3">
                <img src="{{ asset('assets/images/cov.png') }}" width="100%" height="100%">
                <p>感染対策に協力します</p>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
<section class="main-wrapper">
    <hr class="borderline">
    <div class="list_sort">
        <form action="" method="post" id="sort_form" name="sort_form">
            @csrf
            <select name="sort_select" onchange="changeSort();" id="sort_select">
                <option value="{{ route('sortHigh') }}">値段が高い順</option>
                <option value="low">値段が安い順</option>
                <option value="fav">お気に入り</option>
            </select>
        </form>
    </div>
    <div class="item-list">
        <div class="item">子要素</div>
        <div class="item">子要素</div>
        <div class="item">子要素</div>
        <div class="item">子要素</div>
        <div class="item">子要素</div>
        <div class="item">子要素</div>
    </div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/slider.js') }}"></script>

@include('common.footer')
