<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="container brand">
                    <a class="navbar-brand" href="#">{{ Auth::user()->fullname }}</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu h-75 d-flex flex-column justify-content-between">
            <ul class="menu mt-0">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Management</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="component-alert.html">Stock</a>
                        </li>
                        <li class="submenu-item">
                            <a href="component-badge.html">Penjualan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="component-breadcrumb.html">Data Barang</a>
                        </li>
                    </ul>
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Absensi Staff</span>
                    </a>
                </li>
            </ul>

            <ul class="menu">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
