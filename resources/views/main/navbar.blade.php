<div class="navbar__toggle">
    <i class="fas fa-bars"></i> <!-- Hamburger menu icon -->
</div>

 @if  (Auth::check() && Auth::user()->role == "admin")
 <nav class="navbar">
     <ul class="navbar__list">
         <li class="navbar__item">
             <a href="{{ route('admin.admin') }}" class="navbar__link">Home</a>
         </li>
         <li class="navbar__item">
             <a href="{{ route('admin.user_manager') }}" class="navbar__link">User Manager</a>
         </li>
         <li class="navbar__item">
             <a href="{{ route('admin.product_manager') }}" class="navbar__link">Product Manager</a>
         </li>
         <li class="navbar__item">
             <a href="{{ route('admin.order_manager') }}" class="navbar__link">Order Manager</a>
         </li>
         <li class="navbar__item">
             <a href="{{ route('logout') }}" class="navbar__link">LogOut</a>
         </li>
     </ul>
 </nav>
     
 @else
 <nav class="navbar">
    <ul class="navbar__list">
    
        <li class="navbar__item">
            <a href="{{ route('index') }}" class="navbar__link">Home</a>
        </li>
        <li class="navbar__item">
            <a href="{{ route('about') }}" class="navbar__link">About</a>
        </li>
        <li class="navbar__item">
            <a href="{{ route('products.product') }}" class="navbar__link">Product</a>
        </li>
        
        
        @guest
            <li class="navbar__item">
                <a href="{{ route('login') }}" class="navbar__link">LogIn</a>
            </li>
            <li class="navbar__link">|</li>
            <li class="navbar__item">
                <a href="{{ route('signup') }}" class="navbar__link">SignUp</a>
            </li>
        @endguest
        @auth
        <li class="navbar__item">
            <a href="{{ route('cart.cart') }}" class="navbar__link">
                <i class="fa-solid fa-cart-shopping navbar__link-icon"></i>
                <span class="navbar__link-text">
                    Cart
                </span>
            </a>
        </li>
            
        <li class="navbar__item">
            <a href="{{ route('contact') }}" class="navbar__link navbar__link--special btn">Contact</a>
        </li>
        <ul class="nav navbar-nav navbar-right">
            <div class="dropdown">
                <button href="" class="dropdown-btn" onclick="toggleDropdown()">
                    {{ Auth::user()->name }} <b class="caret"></b>
                </button>
                <div class="dropdown-content" id="dropdownMenu">
                   <ul>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a> </li>
                   </ul>
                </div>
            </div>
            </ul> 
            @endauth
        
    </ul >
    
</nav>
 @endif

