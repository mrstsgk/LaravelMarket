<script src="{{ asset('/js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>

<footer id="common-footer">
    <div class="pc-footer">
        <nav id="footer-wrap">
            <div class="footer-copyright">
                &copy; 2021-2021 YKW Inc.
            </div>
        </nav>
    </div>
    <div class="mobile-footer">
        <div class="inner-block">
            <div class="area">
                <ul class="footer-wrap">
                    <li class="footer-btn-wrap">
                        <a class="home-btn" href="#">
                            <img src=" {{ asset('assets/images/home.png') }}" class="logo home-logo">
                        </a>
                        <a class="mypage-btn" href="#">
                            <img src=" {{ asset('assets/images/mypage.png') }}" class="logo mypage-logo">
                        </a>
                        <a class="cart-btn" href="#">
                            <img src=" {{ asset('assets/images/cart.png') }}" class="logo cart-logo">
                            <span class="navCartIcon">0</span>
                        </a>
                        <a class="other-btn" href="#">
                            <img src=" {{ asset('assets/images/other.png') }}" class="logo other-logo">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
