<div id="sidebar" class="active">
    <div class="sidebar-wrapper active shadow">
        <div class="d-flex justify-content-between">
            <div class="container brand d-flex flex-column justify-content-center align-items-center fs-5 fw-bold pt-4 pb-3">
                @isset(Auth::user()->image)
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="rounded-circle imgPreview" width="100px" height="100px" alt="{{ Auth::user()->image }}">
                <x-modal-zoom-image></x-modal-zoom-image>
                @else
                <img src="{{ asset("images/user.png") }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @endisset
                <div class="user-account container d-flex justify-content-center align-items-center mt-4">
                    <h5 class="m-0 text-center">{{ Auth::user()->fullname }}</h4>
                </div>
            </div>
            <div class="toggler pe-3">
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

                @if (Auth::user()->username == "admin")
                    @if (request()->route()->uri === 'management/stock')
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                                <span>Manajemen</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="{{ route('stock') }}">Stock</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('penjualan') }}">Penjualan</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('DataStaff') }}">Staff</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('dataCustomer') }}">Customer</a>
                                </li>
                            </ul>
                        </li>
                    @elseif (request()->route()->uri === 'management/penjualan')
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                                <span>Manajemen</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item">
                                    <a href="{{ route('stock') }}">Stock</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="{{ route('penjualan') }}">Penjualan</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('DataStaff') }}">Staff</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('dataCustomer') }}">Customer</a>
                                </li>
                            </ul>
                        </li>
                    @elseif (request()->route()->uri === 'management/staff')
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                                <span>Manajemen</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item">
                                    <a href="{{ route('stock') }}">Stock</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('penjualan') }}">Penjualan</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="{{ route('DataStaff') }}">Staff</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('dataCustomer') }}">Customer</a>
                                </li>
                            </ul>
                        </li>
                    @elseif (request()->route()->uri === 'management/customer')
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                                <span>Manajemen</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item">
                                    <a href="{{ route('stock') }}">Stock</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('penjualan') }}">Penjualan</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('DataStaff') }}">Staff</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="{{ route('dataCustomer') }}">Customer</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                                <span>Manajemen</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="{{ route('stock') }}">Stock</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('penjualan') }}">Penjualan</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('DataStaff') }}">Staff</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('dataCustomer') }}">Customer</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="sidebar-item {{ request()->route()->uri === 'penjualan-staff' ? 'active' : '' }}">
                        <a href="{{ route('penjualan-staff') }}" class='sidebar-link'>
                            <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                            <span>Penjualan Staff</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-item {{ request()->route()->uri === 'absensi' ? 'active' : '' }}">
                    <a href="{{ route('absensi') }}" class='sidebar-link'>
                        <i class="fas fa-address-book me-2"></i>
                        <span>Absensi</span>
                    </a>
                </li>
            </ul>

            <ul class="menu">
                <li class="sidebar-item">
                    <a href="#modalLogout" class="sidebar-link" data-bs-toggle="modal">
                        <i class="fas fa-door-open" style="margin-right: 18px"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>