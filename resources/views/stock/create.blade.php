<x-app-layout title="Tambah Stok">
    <h2>Penambahan Stok Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama_barang" class="form-label fw-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" class="form-control">
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-3">Kategori</label>
                    <select name="kategori_barang" value="{{ old('kategori_barang') }}" class="form-select form-select-sm" aria-label=".form-select-sm">
                        <option selected>Pilih Kategori</option>
                        <option value="Tissue">Tissue</option>
                        <option value="Doorsmeer">Doorsmeer</option>
                        <option value="Peralatan Lainnya">Peralatan Lainnya</option>
                    </select>
                    @error('kategori_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-3">Deskripsi Barang</label>
                    <textarea name="deskripsi_barang" value="{{ old('deskripsi_barang') }}" class="editor form-control" rows="3"></textarea>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('.editor'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                    @error('deskripsi_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jumlah_barang" class="form-label fw-bold mt-3">Jumlah</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang') }}"  class="form-control" min="1">
                    @error('jumlah_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="label-gambar d-flex justify-content-between align-items-center mt-3">
                        <label for="image" class="form-label fw-bold">Gambar</label>
                        <button id="clear_image" type="reset" onclick="clearImage()" class="d-none badge bg-danger border-0 fs-6 fw-normal mb-2">
                            Hapus Gambar
                        </button>
                    </div>
                    <input name="image" type="file" id="image" class="form-control input-image" onchange="preview()">
                    <img id="frame" src="" class="img-fluid mt-3 mb-3" />
                    <br>
                    @error('image')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Tambah Stok</button>
                    </div>
                </div>
            </div>

            <!-- untuk preview dan hapus image -->
            <script>
                function preview() {
                    let clear_image = document.getElementById('clear_image');
                    clear_image.classList.remove("d-none");
                    frame.src = URL.createObjectURL(event.target.files[0]);
                    frame.style.width = "150px";
                }
                function clearImage() {
                    let clear_image = document.getElementById('clear_image');
                    clear_image.classList.add("d-none");
                    frame.src = "";
                }
            </script>
        </form>
    </x-form-card>
</x-app-layout>
