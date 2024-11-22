
<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
    <link rel="stylesheet" href="/assets/css/product.css">
    <link rel="stylesheet" href="/assets/css/cart.css">
    <link rel="stylesheet" href="/assets/css/checkout.css">
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
                        <img src="../assets/img/logo4.png" alt="" class="logo">
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
        <!-- Checkout Page Start -->
        <section class="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1 class="checkout__title section-title">Billing details</h1>
                        <form action="{{ route('order.checkout') }}" method="post"> 
                            @csrf
                            <div class="form-group checkout__item">
                                <label class="checkout__label">Full Name<sup>*</sup></label>
                                <input type="text" class="form-control checkout__input" name="name" value="{{ $user->name }}">
                            </div>
                            
                            <div class="form-group checkout__item">
                                <label class="checkout__label">Address <sup>*</sup></label>
                                <input type="text" class="form-control checkout__input" placeholder="Address" name="address" value="{{ $user->address }}">
                            </div>
                            
                            <div class="form-group checkout__item">
                                <label class="checkout__label">Mobile<sup>*</sup></label>
                                <input type="text" class="form-control checkout__input" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group checkout__item">
                                <label class="checkout__label">Email Address<sup>*</sup></label>
                                <input type="email" class="form-control checkout__input" name="email" value="{{ $user->email }}">
                            </div>
                            <button type="submit" class="btn btn-2 w-100">Buy</button>

                        </form>
                    </div>
                    <div class="col-6">
                        <table class="table cart__table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedItems as $item)
                                <tr>
                                    <td>
                                        <div class="cart__product">
                                            <figure class="cart__img-wrap">
                                                <img src="/assets/img/{{ $item->prod->image }}" alt="" class="cart__img">
                                            </figure>
                                            
                                        </div>
                                    </td>
                                    <td><h3 class="cart__product-title">{{$item->prod->name  }}</h3></td>
                                  
                                    <td>{{ $item->prod->price}}</td>
                                    
                                    <td>
                                       
                                        <div class="cart__number-box form-group">
                                            <input type="text" class="form-control text-center cart__number" value="{{ $item->quantity }}" name="quantity">      
                                        </div>
                                        
                                    
                                    </td>
                                    <td>${{$item->price}}</td>
                                    
                                </tr>
                                    
                                @endforeach
                            </tr>
                                    {{-- @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <div class="cart__product">
                                                <figure class="cart__img-wrap">
                                                    <img src="/assets/img/{{ $item->prod->image }}" alt="" class="cart__img">
                                                </figure>
                                                
                                            </div>
                                        </td>
                                        <td><h3 class="cart__product-title">{{$item->prod->name  }}</h3></td>
                                      
                                        <td>{{ $item->prod->price}}</td>
                                        
                                        <td>
                                           
                                            <div class="cart__number-box form-group">
                                                <input type="text" class="form-control text-center cart__number" value="{{ $item->quantity }}" name="quantity">      
                                            </div>
                                            
                                        
                                        </td>
                                        <td>${{$item->price}}</td>
                                        
                                    </tr>
                                    @endforeach
                               
                                <tr> --}}

                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class="">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="">
                                        <div class="">
                                            <p class="mb-0 text-dark">$135.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td colspan="2">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout Page End -->

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