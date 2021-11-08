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

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

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
                
                <h2>Tambah Stock Barang</h2>
                
                @if(Session::has('success'))
                    <div class="alert alert-success">            
                        {{ Session::get('success') }}            
                        @php            
                            Session::forget('success');            
                        @endphp            
                    </div>
                @endif

                <form method="POST" action="{{route('stock.store')}}" enctype="multipart/form-data" class="row g-3">
                @csrf

                    <div class="col-6">
                        <label for="nama_brg" class="form-label @error('name') is-invalid @enderror">Nama Barang</label>
                        <input type="text" name="nama_brg" value="{{ old('nama_brg') }}" class="form-control" id="nama_brg" placeholder="">
                        @error('nama_brg')
                            <br>
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>

                        <label for="inputAddress" class="form-label">Kategori</label>
                        <select name="kategori_brg" value="{{ old('kategori_brg') }}" class="form-select" id="inputGroupSelect01">
                            <option selected>Pilih Kategori</option>
                            <option value="Tissue">Tissue</option>
                            <option value="Doorsmeer">Doorsmeer</option>
                            <option value="Peralatan Lainnya">Peralatan Lainnya</option>
                        </select>
                        @error('kategori_brg')
                            <br>
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>

                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea name ="deskripsi_brg" value="{{ old('deskripsi_brg') }}" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <script>
                            CKEDITOR.replace('deskripsi_brg');
                        </script>
                        @error('deskripsi_brg')
                            <br>
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>

                        <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
                        <input type="number" value="{{ old('jumlah_brg') }}" name="jumlah_brg" class="form-control" id="inputAddress" placeholder="">
                        @error('jumlah_brg')
                            <br>
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>

                        <label for="Image" class="form-label">Gambar</label>
                        
                        <input name="image" class="form-control" type="file" id="formFile" onchange="preview()">
                        <button onclick="clearImage()" class="btn btn-primary mt-3">Hapus Gambar</button>
                        <br>
                        <img id="frame" src="" class="img-fluid" />
                    </div>

                    <!-- untuk preview image -->
                    <script>
                        function preview() {
                            frame.src = URL.createObjectURL(event.target.files[0]);
                        }
                        function clearImage() {
                            document.getElementById('formFile').value = null;
                            frame.src = "";
                        }
                    </script>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                    </div>
                </form>

                <x-footer></x-footer>
            </div>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
