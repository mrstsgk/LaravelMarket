<script src="{{ asset('/js/app.js') }}" defer></script>
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
            <ul class="footer-wrap">
                <li class="footer-btn-wrap">
                    <a class="home-btn" href="#">
                        <img src=" {{ asset('assets/images/home.png') }}" class="logo home-logo">
                    </a>
                </li>
                <li class="footer-btn-wrap">
                    <a class="mypage-btn" href="#">
                        <img src=" {{ asset('assets/images/mypage.png') }}" class="logo mypage-logo">
                    </a>
                </li>
                <li class="footer-btn-wrap">
                    <a class="cart-btn" href="#">
                        <img src=" {{ asset('assets/images/cart.png') }}" class="logo cart-logo">
                        <span class="navCartIcon">0</span>
                    </a>
                </li>
                <li class="footer-btn-wrap">
                    <a class="other-btn" href="#">
                        <img src=" {{ asset('assets/images/other.png') }}" class="logo other-logo">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

</html>
