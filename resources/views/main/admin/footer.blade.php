<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="row">
                <div class="col-6">
                    <div class="footer__site-map">
                        <h3 class="footer__title section-title">
                            Site Map
                        </h3>
                        <ul class="footer__list am">
                            <li class="footer__item it-am">
                                <a href="{{ route('admin.admin') }}" class="footer__link">Home</a>
                            </li>
                            <li class="footer__item it-am">
                                <a href="{{ route('admin.user_manager') }}" class="footer__link">User Manager</a>
                            </li>
                            <li class="footer__item it-am">
                                <a href="{{ route('admin.product_manager') }}" class="footer__link">Product Manager</a>
                            </li>
                            <li class="footer__item it-am">
                                <a href="{{ route('admin.order_manager') }}" class="footer__link">Order Manager</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <figure class="footer__logo-wrap">
                        <img src="/assets/img/logoVG.png" alt="" class="footer__logo">
                    </figure>
                </div>

            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
<!-- JS -->
<script src="/assets/js/app.js"></script>