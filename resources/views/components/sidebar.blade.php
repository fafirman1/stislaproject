<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">POS WEB</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MWP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('home') }}">General Dashboard</a>
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
        </ul>
    </aside>
</div>
