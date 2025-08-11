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
                        @include('main.navbar')
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="main">
        <!-- Cart -->
        <section class="cart">
            <div class="container">
                @include('main.alert')

                {{-- FORM CHECKOUT --}}
                {{-- <form action="{{ route('cart.checkout') }}" method="POST"> --}}
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
                                                <img src="/assets/img/products/{{ $item->prod->image }}" alt="" class="cart__img">
                                            </figure>
                                        </div>
                                    </td>

                                    <td><h3 class="cart__product-title">{{ $item->prod->name }}</h3></td>
                                    <td>{{ $item->prod->price }}</td>

                                    <td>
                                        {{-- FORM RIÊNG CẬP NHẬT SỐ LƯỢNG --}}
                                        <form action="{{ route('cart.update', $item->product_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="number"
                                                name="quantity"
                                                value="{{ $item->quantity }}"
                                                min="1"
                                                class="form-control text-center cart__number"
                                                style="width:70px"
                                                onchange="this.form.submit()">
                                        </form>
                                    </td>

                                    <td>${{ $item->price }}</td>

                                    <td>
                                        <a class="btn-handle" href="{{ route('cart.delete', $item->product_id) }}">
                                            <i class="fa fa-times text-danger"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <input type="checkbox" name="selected_products[]" value="{{ $item->product_id }}" form="checkout-form">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart__action">
                        <a href="{{ route('index') }}" class="btn btn-2">Return To Shop</a>
                        {{-- ✅ FORM CHECKOUT tách riêng, không bọc toàn bộ bảng --}}
                        <form id="checkout-form" action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-2">Check Out</button>
                        </form>
                     </div>
                {{-- </form> --}}
            </div>

            <!-- History -->
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
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td><span>Done</span></td>
                                <td>$ {{ number_format($item->totalPrice) }}.000</td>
                                <td>
                                    <a href="{{ route('order.detail', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Footer & JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    @include('main.footer')
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>

</html>
