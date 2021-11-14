<x-app-layout title="Tambah Stock">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @php
                session()->forget('success');
            @endphp
        </div>
    @endif

    <h2>Pendaataan Pembelian Customer</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#pembelian" role="tab" aria-controls="home" aria-selected="true">Pembelian</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#customer" role="tab" aria-controls="profile" aria-selected="false">Tambah Customer</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Penambahan Pembelian Barang -->
            <div class="tab-pane fade show active" id="pembelian" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <form method="POST" action="{{ route('customer.store2') }}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Nama Customer</label>
                        <select name="customer_id" value="{{ old('customer_id') }}" class="form-select" id="inputGroupSelect01">
                                <option selected>Pilih Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="inputAddress" class="form-label">Nama Barang</label>
                        <select name="nama_barang" value="{{ old('nama_barang') }}" class="form-select" id="inputGroupSelect01">
                                <option selected>Pilih barang</option>
                            @foreach($stocks as $stock)
                                <option value="{{$stock->nama_barang}}">{{$stock->nama_barang}}</option>
                            @endforeach
                        </select>
                        @error('nama_barang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="jumlah_pembelian" class="form-label">Jumlah</label>
                        <input type="number" min="1" value="{{ old('jumlah_pembelian') }}" name="jumlah_pembelian" class="form-control"
                            id="jumlah_pembelian" placeholder="">
                        @error('jumlah_barang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="tanggal_masuk" class="form-label mt-3">Tanggal Masuk</label>
                        <input type="date" min="1" value="{{ old('tanggal_masuk') }}" name="tanggal_masuk" class="form-control"
                            id="tanggal_masuk" placeholder="">
                        @error('tanggal_masuk')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>

                    <!-- untuk preview dan hapus image -->
                    <script>
                        function preview() {
                            frame.src = URL.createObjectURL(event.target.files[0]);
                        }

                        function clearImage() {
                            frame.src = "";
                        }
                    </script>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                    </div>
                </form>
            </div>

            <!-- Penambahan Customer -->
            <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-6">
                        <label for="nama_customer" class="form-label @error('name') is-invalid @enderror">Nama Customer</label>
                        <input type="text" name="nama_customer" value="{{ old('nama_customer') }}" class="form-control"
                            id="nama_customer" placeholder="">
                        @error('nama_customer')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>
                    
                        <label for="inputAddress" class="form-label">Daerah</label>
                        <select name="kategori_daerah" value="{{ old('kategori_daerah') }}" class="form-select"
                            id="inputGroupSelect01">
                            <option selected>Pilih Kategori</option>
                            <option value="Gunung">Gunung</option>
                            <option value="Medan">Medan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('kategori_daerah')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="alamat_customer" class="form-label @error('alamat') is-invalid @enderror">Alamat Customer</label>
                        <input type="text" name="alamat_customer" value="{{ old('alamat_customer') }}" class="form-control"
                            id="alamat_customer" placeholder="">
                        @error('alamat_customer')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>

                        <label class="form-label @error('typePhone') is-invalid @enderror" for="typePhone">No Telp Costumer</label>
                        <input type="tel" name="telp_customer" value="{{ old('telp_customer') }}" id="typePhone" class="form-control" />
                        @error('telp_customer')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>

                    <!-- untuk preview dan hapus image -->
                    <script>
                        function preview() {
                            frame.src = URL.createObjectURL(event.target.files[0]);
                        }

                        function clearImage() {
                            frame.src = "";
                        }
                    </script>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>

    
</x-app-layout>
