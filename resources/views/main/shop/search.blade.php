<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
    <link rel="stylesheet" href="assets/css/product.css">

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
                        @include('main.navbar')

                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="search">
        <div class="container">
            <div class="search__form-group">
                @include('main.alert')
                <form action="{{ route('search') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="form-group">
                                <label for="search__location" class="search__label">Product Name</label>
                                <input type="text" name="search_name" id="search__location"
                                    class="search__location form-control" placeholder="Search for name...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="form-group">
                                <label for="search__type" class="search__label">Product Type</label>
                                <select name="search_type" id="search__type" class="search__select form-control">
                                    <option class="search__option" value="">Select Product Type</option>
                                    @foreach($cats as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label for="search__duration" class="search__label">Product Origin</label>
                                <select name="search_origin" id="search__duration"
                                    class="search__select form-control">
                                    <option class="search__option" value="">Select Origin</option>
                                    @foreach($origins as $origin)
                                    <option value="{{$category->origin}}">{{$origin->origin}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-2 search__btn">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>
    <section class="product">
        <div class="container">
            <div class="product__inner">
                <div class="row">
                <div class="search-result">
                    <p class="search-result__text">Tìm thấy <span class="search-result__count">{{ count($product) }}</span> sản phẩm</p>
                </div>
                </div>
                <div class="row">
                    
                    @foreach ($product as $prod)
                        <div class="col-lg-3 col-6">
                            <div class="product__item">
                                <a href="{{ route('details',$prod->id) }}">
                                <figure class="product__img-wrap">
                                    <img src="/assets/img/products/{{ $prod->image }}" alt="" class="product__img">
                                </figure>
                                <div class="product__item-body">
                                    <p class="product__type">
                                        {{ $prod->cat->name }}
                                    </p>
                                    <h3 class="product__item-title">
                                        {{ $prod->name }}
                                    </h3>
                                </a>
                                    <div class="ratting">
                                       
                                        <i class="fa-solid fa-star product__ratting-icon"></i>
                                        <i class="fa-solid fa-star product__ratting-icon"></i>
                                        <i class="fa-solid fa-star product__ratting-icon"></i>
                                        <i class="fa-solid fa-star product__ratting-icon"></i>
                                        <i class="fa-solid fa-star product__ratting-icon"></i>
                                        <span>(100.0)</span>
                                    </div>
                                    <p class="manu">
                                        <span>By</span> <span>{{ $prod->origin }}</span>
                                    </p>
                                    <div class="product__actions">
                                        <p class="product__price">
                                            <span class="product__price-before">${{ $prod->price }}</span>
                                           {{-- <span class="product__price-after">${{ $prod->price_after }}</span> --}}
                                        </p>
                                        @if (auth()->check())
                                            <a href="{{ route('cart.add',$prod->id) }}" class="btn btn-2 product__btn-link">Add</a>                                                
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-2 product__btn-link">Add</a>                                                
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<!-- JS -->
@include('main.footer')
<script src="/assets/js/app.js"></script>
<script src="/assets/js/cart.js"></script>
</body>

</html>