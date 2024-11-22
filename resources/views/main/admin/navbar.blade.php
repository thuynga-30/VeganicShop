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