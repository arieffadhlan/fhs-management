<div id="sidebar" class="active">
    <div class="sidebar-wrapper active shadow-sm">
        <div class="d-flex justify-content-between">
            <div
                class="container brand d-flex flex-column justify-content-center align-items-center fs-5 fw-bold pt-4 pb-3">
                @isset(Auth::user()->image)
                    <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="rounded-circle" width="100px"
                        height="100px" alt="{{ Auth::user()->fullname }}">
                @else
                    <img src="{{ asset('images/user.png') }}" class="rounded-circle" width="100px" height="100px"
                        alt="{{ Auth::user()->fullname }}">
                @endisset
                <div class="user-account container d-flex justify-content-center align-items-center mt-4">
                    <h5 class="m-0 text-center">{{ Auth::user()->fullname }}</h5>
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

                <li class="sidebar-item {{ set_active('dashboard') }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="fas fa-home me-1"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->role == 'admin')
                    <li
                        class="sidebar-item has-sub {{ set_active(['master/barang', 'master/kategori', 'master/supplier', 'master/customer', 'master/pengguna']) }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                            <span>Data Master</span>
                        </a>
                        <ul
                            class="submenu {{ set_active(['master/barang', 'master/kategori', 'master/supplier', 'master/customer', 'master/pengguna']) }}">
                            <li class="submenu-item {{ set_active('master/kategori') }}">
                                <a href="{{ route('kategori') }}">Kategori</a>
                            </li>
                            <li class="submenu-item {{ set_active('master/barang') }}">
                                <a href="{{ route('barang') }}">Barang</a>
                            </li>
                            <li class="submenu-item {{ set_active('master/supplier') }}">
                                <a href="{{ route('supplier') }}">Supplier</a>
                            </li>
                            <li class="submenu-item {{ set_active('master/customer') }}">
                                <a href="{{ route('customer') }}">Customer</a>
                            </li>
                            <li class="submenu-item {{ set_active('master/pengguna') }}">
                                <a href="{{ route('pengguna') }}">Pengguna</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="sidebar-item has-sub {{ set_active(['laporan/transaksi-barang', 'laporan/absensi']) }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-file-alt" style="margin-right: 11px"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu {{ set_active('laporan/transaksi-barang') }}">
                            <li class="submenu-item {{ set_active('laporan/transaksi-barang') }}">
                                <a href="{{ route('transaksi-barang') }}">Transaksi Barang</a>
                            </li>
                            <li class="submenu-item {{ set_active('laporan/absensi') }}">
                                <a href="{{ route('absensi') }}">Absensi</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="sidebar-item has-sub {{ set_active(['master/barang', 'master/kategori']) }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-layer-group" style="margin-right: 6px"></i>
                            <span>Data</span>
                        </a>
                        <ul class="submenu {{ set_active(['master/barang', 'master/kategori']) }}">
                            <li class="submenu-item {{ set_active('master/kategori') }}">
                                <a href="{{ route('kategori') }}">Kategori</a>
                            </li>
                            <li class="submenu-item {{ set_active('master/barang') }}">
                                <a href="{{ route('barang') }}">Barang</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item has-sub {{ set_active(['transaksi']) }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-file-alt" style="margin-right: 11px"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu {{ set_active('transaksi') }}">
                            <li class="submenu-item {{ set_active('transaksi') }}">
                                <a href="{{ route('transaksi') }}">Transaksi Barang</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="sidebar-item {{ set_active('transaksi/create') }}">
                    <a href="{{ route('transaksi.create') }}" class='sidebar-link'>
                        <i class="fas fa-exchange-alt me-2"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ set_active('absensi') }}">
                    <a href="{{ route('absensi') }}" class="sidebar-link">
                        <i class="fas fa-pen me-4"></i>
                        Absensi
                    </a>
                </li>
                <li class="sidebar-item {{ set_active('akun') }}">
                    <a href="{{ route('akun') }}" class='sidebar-link'>
                        <i class="fas fa-user me-2"></i>
                        <span>Akun</span>
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
