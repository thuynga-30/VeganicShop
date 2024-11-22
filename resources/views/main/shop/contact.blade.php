<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/contact.css">

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header__inner">
            <!-- Header top -->
            <div class="header__top">
                <div class="container">
                    <div class="header__top-inner">
                        <!-- Logo -->
                        <img src="assets/img/logo4.png" alt="" class="logo">
                        <!-- Navbar -->
                        @include('main.shop.navbar')

                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <!-- End Header -->
    <!-- Main -->
    <main class="main">
        <!-- Contact Form -->
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-sm-12">
                        <div class="contact-form">
                            <div class="contact__top">
                                <p class="contact__desc section-desc-heading">
                                    Would like to talk?
                                </p>
                                <h3 class="contact__title section-title">
                                    Contact Details
                                </h3>
                            </div>
                            <form action="{{ route('contact-store') }}" method="post" autocomplete="on">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" value=" {{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value=" {{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" value=" {{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" class="form-control" id="content" placeholder="Nội dung" rows="8" maxlength="600" required></textarea>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="contact__btn btn btn-2">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-12">
                        <div class="inner-contact">
                            <div class="contact__info">
                                <div class="contact__top">
                                    <h3 class="contact__title section-title">
                                        Contact Details
                                    </h3>
                                </div>
                                <p class="contact__desc">
                                    If you have a story to share or a question that has not been answered on our website, please get in touch with us via contact details listed below or fill in the form on the right.
                                </p>
                                <ul class="contact__list">
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                        <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <a class="contact__link" href="mailto:contact@tnna.vn">0943362482</a>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                        <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <a class="contact__link" href="mailto:contact@tnna.vn">veganicshopa@gmail.com</a>
                                    </li>
                                    <li class="contact__item">
                                        <div class="contact__icon-wrap">
                                        <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <a class="contact__link" href="mailto:contact@tnna.vn">356/19 Ngũ Hành Sơn</a>
                                    </li>
                                </ul>
                                <div class="contact__social">
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@ndt02092005?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></i></a>
                                    <a href="https://www.instagram.com/entyyy_29/"><i class="fa-brands fa-instagram"></i></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d61371.720293245744!2d108.2120272!3d15.9753389!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVmlldG5hbSAtIEtvcmVhIFVuaXZlcnNpdHkgb2YgSW5mb3JtYXRpb24gYW5kIENvbW11bmljYXRpb24gVGVjaG5vbG9neSwgxJDGsOG7nW5nIFRy4bqnbiDEkOG6oWkgTmdoxKlhLCBIw7JhIFF1w70sIE5nxakgSMOgbmggU8ahbiwgRGEgTmFuZywgVmlldG5hbQ!3m2!1d15.975260299999999!2d108.253227!5e0!3m2!1sen!2s!4v1730963950324!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    <!-- End Main -->
    <!-- Footer -->
    
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    @include('main.footer')
</body>

</html>