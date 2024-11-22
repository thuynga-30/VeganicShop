<nav class="navbar">
    <ul class="navbar__list">
        @guest
        <li class="navbar__item">
            <a href="{{ route('index') }}" class="navbar__link">Home</a>
        </li>
        @endguest
        @auth
        <li class="navbar__item">
            <a href="{{ route('index') }}" class="navbar__link">Home</a>
        </li>
        @endauth
        
        <li class="navbar__item">
            <a href="{{ route('about') }}" class="navbar__link">About</a>
        </li>
        <li class="navbar__item">
            <a href="{{ route('product') }}" class="navbar__link">Product</a>
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
            </ul> 
            @endauth
    </ul >
    
   
        </div>
    
</nav>