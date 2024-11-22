<!DOCTYPE html>
<html lang="en">

<head>
 @include('main.admin.head')  
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
                        @include('main.admin.navbar')
                    </div>
                </div>
            </div>
        </div>
        <div class="header__content">
            <div class="container">
                <div class="header__content-inner">
                    <figure class="header__img-wrap">
                        <img src="/assets/img/Organic.png" alt="" class="header__img">
                    </figure>
                    <h1 class="header__title">
                        Greetings, Admin!
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
   
   @include('main.admin.footer')
</body>

</html>