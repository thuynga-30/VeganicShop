<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="footer__site-map">
                        <h3 class="footer__title section-title">
                            Site Map
                        </h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="{{ route('index') }}" class="footer__link">Home</a>
                            </li>
                            <li class="footer__item">
                                <a href="{{ route('about') }} " class="footer__link">About</a>
                            </li>
                            <li class="footer__item">
                                <a href="{{ route('contact') }} " class="footer__link">Product</a>
                            </li>
                            <li class="footer__item">
                                <a href="{{ route('cart.cart') }} " class="footer__link">Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-6 ft-rp">
                    <figure class="footer__logo-wrap">
                        <img src="/assets/img/logoVG.png" alt="" class="footer__logo">
                    </figure>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="footer__form">
                        <h3 class="footer__title section-title">
                            Contact us here
                        </h3>
                        <form action="{{ route('contact-store') }}" method="post" autocomplete="on" >
                            <div class="footer__form-inner">
                                <div class="footer__form-group form-group">
                                    <input type="email" id="email" name="email" class="form-control footer__form-input"
                                        placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="footer__form-inner1">
                                <div class="footer__form-group form-group">
                                    <input type="text" name="content"  id="content" class="form-control footer__form-input"
                                        placeholder="Enter your message" required>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Bootstrap-->
<!-- JS -->

