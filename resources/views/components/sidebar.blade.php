<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Moko Wardah Parfum</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MWP</a>
        </div>
        <ul class="sidebar-menu">
            <div class="dropdown-divider"></div>
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('home') }}">Dashboard</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ route('user.index') }}">All Users</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fab fa-uncharted"></i>
                    <span>Products</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('product.index') }}">All Products</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fab fa-opencart"></i>
                    <span>Penjualan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Data Transaksi</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Laporan Penjualan</a>
                    </li>
                </ul>
            </li>

            <div class="dropdown-divider"></div>
            <li class="menu-header">Action</li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link text-danger" onclick="event.preventDefault();
                document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                        @csrf
                        </form>
            </li>
        </ul>
    </aside>
</div>
