<x-app-layout title="Tambah Stock">
    <h2>Penambahan Stock Barang</h2>
    <form method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">
            <label for="nama_barang" class="form-label @error('name') is-invalid @enderror">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control"
                id="nama_barang" placeholder="">
            @error('nama_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="inputAddress" class="form-label">Kategori</label>
            <select name="kategori_barang" value="{{ old('kategori_barang') }}" class="form-select"
                id="inputGroupSelect01">
                <option selected>Pilih Kategori</option>
                <option value="Tissue">Tissue</option>
                <option value="Doorsmeer">Doorsmeer</option>
                <option value="Peralatan Lainnya">Peralatan Lainnya</option>
            </select>
            @error('kategori_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
            <textarea name="deskripsi_barang" value="{{ old('deskripsi_barang') }}" class="editor form-control"
                id="exampleFormControlTextarea1" rows="3"></textarea>
            <script>
                ClassicEditor
                    .create(document.querySelector('.editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            @error('deskripsi_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="jumlah_barang" class="form-label">Jumlah</label>
            <input type="number" min="1" value="{{ old('jumlah_barang') }}" name="jumlah_barang" class="form-control"
                id="jumlah_barang" placeholder="">
            @error('jumlah_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="image" class="form-label">Gambar</label>
            <input name="image" class="form-control input-image" type="file" id="image" onchange="preview()">
            <img id="frame" src="" class="img-fluid mt-3 mb-1" />
            <button onclick="clearImage()" type="reset" class="btn btn-primary mt-3">Hapus Gambar</button>
            <br>
            @error('image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
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
</x-app-layout>
