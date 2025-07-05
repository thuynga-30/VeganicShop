<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.header')
 
    <link rel="stylesheet" href="/assets/css/product.css">
    <link rel="stylesheet" href="/assets/css/cart.css">
    
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
                        @include('main.navbar')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Main -->
    
    <main class="main">
        <!-- Cart -->
        
        <section class="cart">
            <h4 class="order-details-title">Order Details</h4>
            <div class="container">
                <div class="row">
                <div class="col-lg-6 clo-12">
                <h3 class="history-title">Users Infor</h3>
                <table class="table cart__table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $order->gender }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        
                    </thead>
                </table>
            </div>
                <div class="col-lg-6 clo-12">
                        <h3 class="history-title">Orders Infor</h3>
                    
                    <table class="table cart__table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->details as $item)
                            <tr>
                                <td scope='row'>{{ $loop->index+1 }} </td>
                                <td>
                                    <div class="cart__product">
                                        <figure class="cart__img-wrap">
                                            <img src="/assets/img/products/{{ $item->prod->image }}" alt="" class="cart__img">
                                        </figure> 
                                    </div>
                                </td>
                                <td>
                                    <div class="cart__product">
                                        {{ $item->prod->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="cart__product">
                                        {{ $item->quantity }}
                                    </div>
                                </td>
                                <td>
                                    <div class="cart__product">
                                    ${{number_format($item->price)}}.000
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="cart__action">
                        @if (Auth::user()->role == "user")
                        <a href="{{ route('cart.cart') }}" class="btn btn-2">Return Back</a>
                        @else
                        <a href="{{ route('admin.order_manager') }}" class="btn btn-2">Return Back</a>
                        @endif
                        
                    </div>
            </section>
           
       
    </main>
    <!-- Emd Main -->
    <!-- Footer -->
   
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- JS -->
    @include('main.footer')
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>

</html>