<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
 
    <link rel="stylesheet" href="/assets/css/product.css">
    <link rel="stylesheet" href="/assets/css/product-detail.css  ">
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
                        <img src="/assets/img/logo4.png" alt="" class="logo">
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
        <div class="product-detail">
            <div class="container">
                <div class="product-detail__inner">
                    <div class="row">
                        <div class="col-9">
                            <div class="product-detail__content">
                                <div class="row">
                                    <div class="col-6">
                                        <figure class="product-detail__media">
                                            <img src="/assets/img/{{ $product->image }}" alt="" class="product-detail__img">
                                        </figure>
                                      
                                    </div>
                                    <div class="col-6">
                                        <div class="product-detail__sale">
                                            <h2 class="product-detail__title">
                                                {{ $product->name }}
                                            </h2>
                                            <div class="ratting">
                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                <span>(100.0)</span>
                                            </div>
                                            <p class="product-detail__price">
                                                <span class="product-detail__price--bold">
                                                    ${{ $product ->price }}
                                                </span>
                                                
                                            </p>
                                            <p class="product-detail__desc">
                                                {{ $product ->basic_des }}
                                            </p>
                                            <div class="product-detail__list-size">
                                                <span>
                                                    Size / Weight:
                                                </span>
                                                <span class="product-detail__size product-detail__size--active">
                                                    50g
                                                </span>
                                                <span class="product-detail__size">
                                                    100g
                                                </span>
                                                <span class="product-detail__size">
                                                    1000g
                                                </span>
                                                <span class="product-detail__size">
                                                    100000g
                                                </span>
                                            </div>
                                            <form action="cart.add" method="get">
                                            <div class="product-detail__action">
                                                <div class="product-detail__number-box form-group">
                                                  
                                                    <input type="number"
                                                        class="form-control text-center product-detail__number">
                                                  
                                                </div>
                                                <button class="product-detail__btn-action btn btn-2"><i
                                                        class="fa-solid fa-cart-shopping"></i> <span>Add</span></button>
                                            </div>
                                            </form>
                                            <div class="product-detail__desc-list">
                                                <p class="product-detail__desc-item">
                                                    <span class="product-detail__desc-item-title">Type</span>
                                                    <span>{{ $product->cat->name }}</span>
                                                </p>                         
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="product-detail__info">
                                            <div class="product-detail__info-actions">
                                                <a href=""
                                                    class="product-detail__info-action product-detail__info-action--active">Description</a>
                                                    <a href=""
                                                    class="product-detail__info-action">Review</a>                                              
                                            </div>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                {{ $product ->description }}
                                            </p>
                                            <ul class="product-detail__info-list">
                                                <li class="product-detail__info-item-desc">
                                                    <span>Type Of Packing</span>
                                                    <span>Bottle</span>
                                                </li>
                                                
                                            </ul>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                {{ $product->descri }}
                                            </p>
                                            <h3 class="product-detail__info-title">
                                                Packaging & Delivery
                                            </h3>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello
                                                far meadowlark imitatively egregiously hugged that yikes
                                                minimally unanimous pouted flirtatiously as beaver beheld above forward
                                                energetic across this jeepers beneficently cockily less a the
                                                raucously that magic upheld far so the this where crud then below after
                                                jeez
                                                enchanting drunkenly more much wow callously irrespective
                                                limpet.
                                            </p>
                                            <h3 class="product-detail__info-title">
                                                Suggested Use
                                            </h3>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Refrigeration not necessary.
                                            </p>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Stir before serving
                                            </p>
                                            <h3 class="product-detail__info-title">
                                                Other Ingredients
                                            </h3>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Organic raw pecans, organic raw cashews.
                                            </p>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                This butter was produced using a LTG (Low Temperature Grinding) process
                                            </p>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Made in machinery that processes tree nuts but does not process peanuts,
                                                gluten, dairy or soy
                                            </p>
                                            <h3 class="product-detail__info-title">
                                                Warnings
                                            </h3>
                                            <p class="product-detail__info-desc product-detail__desc">
                                                Oil separation occurs naturally. May contain pieces of shell.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="product-detail__related">
                                            <div class="row">
                                                @foreach ($randomProducts as $rand)
                                                <div class="col-3">
                                                    <div class="product-detail__related-item">
                                                        <figure class="product-detail__related-img-wrap">
                                                            <img src="/assets/img/{{ $rand->image }}" alt=""
                                                                class="product-detail__related-img">
                                                        </figure>
                                                        <div class="product-detail__related-item-body">
                                                            <h4 class="product-detail__related-item-title">
                                                                {{ $rand->name }}
                                                            </h4>
                                                            <div class="ratting">
                                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                                <i class="fa-solid fa-star product__ratting-icon"></i>
                                                                <span>(100.0)</span>
                                                            </div>
                                                            <p class="product-detail__price">
                                                                <span class="product-detail__price--bold">
                                                                    {{ $rand->price }}
                                                                </span>
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="product-detail__other">
                                <h3 class="product-detail__other-title">
                                    New title
                                </h3>
                                <div class="product-detail__other-list">
                                    @foreach ($randomProducts as $rand)
                                        <div class="product-detail__other-item">
                                            <figure class="product-detail__other-img-wrap">
                                                <img src="/assets/img/{{ $rand->image }}" alt="" class="product-detail__other-img">
                                            </figure>
                                            <div class="product-detail__other-item-content">
                                                <h4 class="product-detail__other-item-title">
                                                    {{ $rand->name }}
                                                </h4>
                                                <p class="product-detail__other-item-price">
                                                {{ $rand->price }}
                                                </p>
                                            </div>
                                        </div>
                               @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Emd Main -->
    <!-- Footer -->
    
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- JS -->
    @include('main.footer')
</body>

</html>