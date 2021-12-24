<div id="sidebar" class="active">
    <div class="sidebar-wrapper active shadow-sm">
        <div class="d-flex justify-content-between">
            <div class="container brand d-flex flex-column justify-content-center align-items-center fs-5 fw-bold pt-4 pb-3">
                @isset(Auth::user()->image)
                    <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="rounded-circle" width="100px" height="100px" alt="{{ Auth::user()->fullname }}">
                @else
                    <img src="{{ asset("images/user.png") }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @endisset
                <div class="user-account container d-flex justify-content-center align-items-center mt-4">
                    <h5 class="m-0 text-center">{{ Auth::user()->fullname }}</h4>
                </div>
            </div>
            <div class="toggler pt-3 pe-3">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="fas fa-times fa-lg"></i>
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

                @if (Auth::user()->role == "admin")
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="#">Barang</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#">Transaksi</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('pengguna') }}">Pengguna</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="sidebar-item {{ request()->route()->uri === 'penjualan-staff' ? 'active' : '' }}">
                        <a href="{{ route('penjualan-staff') }}" class='sidebar-link'>
                            <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                            <span>Penjualan Staff</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-item {{ request()->route()->uri === 'profile' ? 'active' : '' }}">
                    <a href="{{ route('akun') }}" class='sidebar-link'>
                    <i class="fas fa-user me-2"></i>
                        <span>Akun</span>
                    </a>
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
                    <a href="#modalLogout" class="sidebar-link" data-bs-toggle="modal">
                        <i class="fas fa-door-open" style="margin-right: 18px"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>