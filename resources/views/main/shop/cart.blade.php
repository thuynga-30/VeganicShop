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
                        <img src="../assets/img/logo4.png" alt="" class="logo">
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
            <div class="container">
                <form action="{{ route('cart.checkout') }}" method="POST">                   
                    @csrf
                <table class="table cart__table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Handle</th>
                            <th>Choose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
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
                                <form action="{{ route('cart.update',$item->product_id) }}" method="get">
                                    @csrf
                                     <div class="cart__number-box form-group">
                                    <input type="number" class="form-control text-center cart__number" value="{{ $item->quantity }}" name="quantity">      
                                    <button><i class="fa fa-save"></i></button>
                                </div>
                            </form>
                            </td>
                            <td>${{$item->price  }}</td>
                        
                            <td>
                                <a class="btn-handle" href="{{ route('cart.delete',$item->product_id) }}">
                                    <i class="fa fa-times text-danger"></i>
                                </a>
                            </td>
                            <td>
                                <input type="checkbox" name="selected_products[]" value="{{ $item->product_id }}" 
                                {{ $item->status ? 'checked' : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="cart__action">
                    <a href="{{ route('index') }}" class="btn btn-2">Return To Shop</a>
                    <button type="submit" class="btn btn-2">Check Out</button>               
                 </div>            
            </form>
            </div>

                <div class="container">
            <div class="history-header">
                <h2 class="history-title">History</h2>
            </div>
            <table class="table cart__table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>OrderDate</th>
                        <th>Status</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auth->orders as $item)
                    <tr>
                        <td scope='row'>{{ $loop->index+1 }} </td>
                        <td>
                            <div class="cart__product">
                                {{ $item->created_at->format('d/m/Y') }}
                            </div>
                        </td>
                        <td>
                            <div class="cart__product">
                                <span>Đã mua</span>
                            </div>
                        </td>
                        {{-- <td><h3 class="cart__product-title">{{$item->name  }}</h3></td> --}}
                            <td>$ {{ number_format($item->totalPrice)}}.000</td>
        
                        <td>
                            <a href="{{ route('order.detail',$item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                        </form>
                        
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
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