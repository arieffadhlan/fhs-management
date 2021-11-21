<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @if (request()->route()->uri !== 'login' && request()->route()->uri !== 'register')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/all.min.css') }}">
</head>

<body>
    <div id="app">
        @guest
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5">
                <div class="container mt-3 mb-3">
                    <a class="navbar-brand fw-bold" href="{{ url('/') }}">FHS-Management</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto d-flex justify-content-end align-items-end">
                            @if (Request::is('login'))
                                <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif

                            @if (Request::is('register'))
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="nav-link fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            <main>
                @yield('content')
            </main>
        @else
            <x-sidebar></x-sidebar>
            <div id="main">
                <x-header></x-header>
                {{ $slot }}
                <x-footer></x-footer>
            </div>
            <x-modal-logout></x-modal-logout>
            @if (request()->route()->uri == 'profile')
                <x-modal-account-image></x-modal-account-image>
            @endif 
        @endguest
    </div>

    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>

    @if (request()->route()->uri == 'management/stock')        
        <script>
            let tableStok = document.querySelector('#tableStok');
            let dataTableStok = new simpleDatatables.DataTable(tableStok);
        </script>
    @elseif (request()->route()->uri == 'management/penjualan')
    <script>
        let tablePenjualanBarang = document.querySelector('#tablePenjualanBarang');
        let tablePembelianCustomer = document.querySelector('#tablePembelianCustomer');
        let tablePenjualanStaff = document.querySelector('#tablePenjualanStaff');
        let dataTablePenjualanBarang = new simpleDatatables.DataTable(tablePenjualanBarang);
        let dataTablePembelianCustomer = new simpleDatatables.DataTable(tablePembelianCustomer);
        let dataTablePenjualanStaff = new simpleDatatables.DataTable(tablePenjualanStaff);
    </script>
    @elseif (request()->route()->uri == 'management/staff')
        <script>
            let tableStaff = document.querySelector('#tableStaff');
            let dataTableStaff = new simpleDatatables.DataTable(tableStaff);
        </script>
    @elseif (request()->route()->uri == 'management/customer')
        <script>
            let tableCustomer = document.querySelector('#tableCustomer');
            let dataTableCustomer = new simpleDatatables.DataTable(tableCustomer);
        </script>
    @elseif (request()->route()->uri == 'absensi')
        <script>
            let tableAbsensi = document.querySelector('#tableAbsensi');
            let dataTableAbsensi = new simpleDatatables.DataTable(tableAbsensi);
        </script>
    @endif
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
