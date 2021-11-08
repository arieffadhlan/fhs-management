<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <x-sidebar></x-sidebar>
            <div id="main">
                <x-header></x-header>
                
                <h2>Pendataan Stock Barang</h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="text-center">
                            <tr class="table-dark">
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Deksripsi</th>
                                <th>Gambar</th>
                                <th>Jumlah Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $index=>$stock)
                            <tr>
                                <td class="text-bold-500">{{$stock->nama_brg}}</td>
                                <td>{{$stock->kategori_brg}}</td>
                                <td class="text-bold-500"{!!nl2br (Str::limit($stock->deskripsi_brg, 150))!!}</td>
                                <td><img style="width: 150px" src="../storage/images/{{$stock->image}}" alt=""></td>
                                <td>{{$stock->jumlah_brg}}</td>
                                <td>
                                    <button class="badge bg-success border-0">Edit</button>
                                    <button class="badge bg-danger border-0">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <br>
                    <a class="btn btn-primary" href="{{ route('tambah') }}" role="button">Tambahkan Stock</a>
                    <button class="btn btn-primary" type="button">Update Stock</button>
                </div>

                <x-footer></x-footer>
            </div>

        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
