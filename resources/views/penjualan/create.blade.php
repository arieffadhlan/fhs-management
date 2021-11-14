<x-app-layout title="Tambah Stock">
    <h2>Penambahan Data Penjualan Barang</h2>
    <form method="POST" action="{{ route('penjualan.store') }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">
            <label for="tanggal_keluar" class="form-label mt-3">Tanggal Keluar</label>
            <input type="date" min="1" value="{{ old('tanggal_keluar') }}" name="tanggal_keluar" class="form-control"
                id="tanggal_masuk" placeholder="">
            @error('tanggal_keluar')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="inputAddress" class="form-label">Nama barang</label>
            <select name="nama_barang" value="{{ old('nama_barang') }}" class="form-select" id="inputGroupSelect01">
                <option selected>Pilih Barang</option>
                @foreach($stock as $stock)
                    <option value="{{$stock->nama_barang}}">{{$stock->nama_barang}}</option>
                @endforeach
            </select>
            @error('nama_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <script>
                ClassicEditor
                    .create(document.querySelector('.editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <br>
            <label for="jumlah_barang" class="form-label">Jumlah barang yang keluar</label>
            <input type="number" min="1" value="{{ old('jumlah_barang') }}" name="jumlah_barang" class="form-control"
                id="jumlah_barang" placeholder="">
            @error('jumlah_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>
        </div>
        </script>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambahkan Data</button>
        </div>
    </form>
</x-app-layout>
