<!DOCTYPE html>
<html lang="en">

<head>
   @include('main.admin.head')
    <link rel="stylesheet" href="/assets/css/product-manager.css">
</head>

<body>
    <!-- Header -->
    <header class="headerprf">
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
    <!-- Main Content -->
    <main class="content-pm">
        <h2 class="section-title-pm">Product Management</h2>

            <h3 class="form-title">Edit Product</h3>
            <form  action="{{ route('admin.update_product',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="lb-pm" for="image">Product Image</label>
                    <input class="ip-pm" type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <img src="/assets/img/products/{{ $product->image }}" alt="" class="product-img" id="productPreview">
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="name">Name</label>
                    <input  class="ip-pm" type="text" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="name">Type</label>
                    <select name="category_id" id="" value="{{ $product->cat->name }}">
                        @foreach($cats as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="origin">Origin</label>
                    <input class="ip-pm" type="text" id="origin" name="origin" value="{{ $product->origin }}">
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="price">Price</label>
                    <input class="ip-pm" type="text" id="price" name="price" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="weight">Weight</label>
                    <input class="ip-pm" type="number" id="weight" name="quantity" value="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="descBasic">Basic Description</label>
                    <textarea class="ip-pm" id="descBasic" name="basic_des" >{{ $product->basic_des }}</textarea>
                </div>
                <div class="form-group">
                    <label class="lb-pm" for="descDetailed">Detailed Description</label>
                    <textarea class="ip-pm" id="descDetailed" name="description"  >{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="btn-pm add-btnpm">Save </button>
            </form>
            <a href="{{ route('admin.product_manager') }}" class="btn-pm edit-btnpm">Cancel</a>
            </section>
    </main>
   
    @include('main.admin.footer')

    <script src="/assets/js/product-manager.js"></script>
</body>

</html>