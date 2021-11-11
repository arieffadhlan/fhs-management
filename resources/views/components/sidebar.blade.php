<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="d-flex justify-content-between">
            <div class="container brand d-flex flex-column justify-content-center align-items-center fs-5 fw-bold pt-4 pb-3">
                @isset(Auth::user()->image)
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @else
                <img src="{{ asset("images/user.png") }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @endisset
                <div class="user-account container d-flex justify-content-center align-items-center mt-4">
                    <h5 class="m-0">{{ Auth::user()->fullname }}</h4>
                </div>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="sidebar-menu d-flex flex-column justify-content-between">
            <ul class="menu mt-0">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->route()->uri === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="fas fa-home me-1"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->route()->uri === 'profile' ? 'active' : '' }}">
                    <a href="{{ route('profile') }}" class='sidebar-link'>
                    <i class="fas fa-user me-2"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ request()->route()->uri === 'management/stock' ? 'active' : '' }}">
                    <a href="{{ route('stock') }}" class='sidebar-link'>
                        <i class="fas fa-layer-group me-2"></i>
                        <span>Management</span>
                    </a>
                    <ul class="submenu {{ request()->route()->uri === 'management/stock' ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->route()->uri === 'management/stock' ? 'active' : '' }}">
                            <a href="{{ route('stock') }}">Stock</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('penjualan') }}">Penjualan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="component-breadcrumb.html">Data Barang</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ request()->route()->uri === 'absensi' ? 'active' : '' }}">
                    <a href="{{ route('absensi') }}" class='sidebar-link'>
                        <i class="fas fa-address-book me-2"></i>
                        <span>Absensi</span>
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
    </div>
</div>

{{-- Modal Account Image --}}
<x-modal-account-image></x-modal-account-image>