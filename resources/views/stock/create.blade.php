<x-app-layout title="Pendataan Stok">
    <h2>Pendataan Stok Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama_barang" class="form-label fw-bold">Nama Barang<sup
                            style="color: red">*</sup></label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}"
                        class="form-control">
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-3">Kategori<sup style="color: red">*</sup></label>
                    <select name="kategori_barang" id="kategori_barang" class="form-select form-select-sm"
                        aria-label=".form-select-sm">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="Tissue" {{ old('kategori_barang') == 'Tissue' ? 'selected' : '' }}>
                            Tissue
                        </option>
                        <option value="Doorsmeer" {{ old('kategori_barang') == 'Doorsmeer' ? 'selected' : '' }}>
                            Doorsmeer
                        </option>
                        <option value="Peralatan Lainnya"
                            {{ old('kategori_barang') == 'Peralatan Lainnya' ? 'selected' : '' }}>
                            Peralatan Lainnya
                        </option>
                    </select>
                    @error('kategori_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-3">Deskripsi Barang<sup style="color: red">*</sup></label>
                    <textarea name="deskripsi_barang" class="editor form-control"
                        rows="3">{{ old('deskripsi_barang') }}</textarea>
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

                    <label for="jumlah_barang" class="form-label fw-bold mt-3">
                        Jumlah Barang<sup style="color: red">*</sup>
                    </label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang') }}"
                        class="form-control" min="1">
                    @error('jumlah_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="label-gambar d-flex justify-content-between align-items-center mt-3">
                        <label for="image" class="form-label fw-bold">Gambar</label>
                        <button id="clear_image" type="button" onclick="clearImage()"
                            class="d-none badge bg-danger border-0 fs-6 fw-normal mb-2">
                            <i class="fa fa-trash me-1"></i>
                            Hapus Gambar
                        </button>
                    </div>
                    <input name="image" type="file" id="image" class="form-control input-image" onchange="preview()">
                    <img id="frame" src="" class="img-fluid mt-3 mb-3 imgPreview" alt="" />
                    <x-modal-zoom-image></x-modal-zoom-image>
                    <br>
                    @error('image')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-paper-plane me-1"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>

            <!-- untuk preview dan hapus image -->
            <script>
                function preview() {
                    let clear_image = document.getElementById('clear_image');
                    clear_image.classList.remove("d-none");
                    frame.src = URL.createObjectURL(event.target.files[0]);
                    frame.alt = document.getElementById('image').files[0].name;
                    frame.style.width = "150px";
                }

                function clearImage() {
                    let clear_image = document.getElementById('clear_image');
                    let image = document.getElementById('image');
                    clear_image.classList.add("d-none");
                    frame.src = "";
                    frame.alt = "";
                    image.value = "";
                }
            </script>
        </form>
    </x-form-card>
</x-app-layout>
