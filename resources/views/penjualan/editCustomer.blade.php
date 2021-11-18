<x-app-layout title="Edit Pembelian Customer">
    <h2>Pengubahan Data Pembelian Customer</h2>

    <form method="POST" action="{{ route('customer.update', $pembelians->id) }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">
            <label for="inputAddress" class="form-label">Nama Customer</label>
            <select name="customer_id" value="{{ old('customer_id') }}" class="form-select" id="inputGroupSelect01">
                    <option selected>Pilih Customer</option>
                @foreach($customers as $customer)
                    @if($pembelians->customer_id == $customer->id)
                    <option value="{{$customer->id}}" selected>{{$customer->nama_customer}}</option>
                    @else
                    <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                    @endif
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
                    @if($pembelians->nama_barang == $stock->nama_barang)
                        <option value="{{$stock->nama_barang}}" selected>{{$stock->nama_barang}}</option>
                    @else
                        <option value="{{$stock->nama_barang}}">{{$stock->nama_barang}}</option>
                    @endif
                @endforeach
            </select>
            @error('nama_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="jumlah_pembelian" class="form-label">Jumlah</label>
            <input type="number" min="1" value="{{ old('jumlah_pembelian', $pembelians->jumlah_pembelian) }}" name="jumlah_pembelian" class="form-control"
                id="jumlah_pembelian" placeholder="">
            @error('jumlah_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="tanggal_masuk" class="form-label mt-3">Tanggal Masuk</label>
            <input type="date" min="1" value="{{ old('tanggal_masuk', $pembelians->tanggal_masuk) }}" name="tanggal_masuk" class="form-control"
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
            <button type="submit" class="btn btn-primary">Ubah Data</button>
        </div>
    </form>
</x-app-layout>