<x-app-layout title="Edit Barang">
    @push('headScripts')
        <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    @endpush

    <h2>Ubah Data Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Barang
        </x-slot>

        <form method="POST" action="{{ route('barang.update', $barang['0']->barang_id) }}"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">nama_barang</x-slot>
                    Nama Barang
                </x-label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                    value="{{ old('nama_barang', $barang['0']->nama_barang) }}">
                @error('nama_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">kategori_barang</x-slot>
                    Kategori Barang
                </x-label>
                <select name="kategori_barang" id="kategori_barang" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('nama_kategori') == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('kategori_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">deskripsi_barang</x-slot>
                    Deskripsi Barang
                </x-label>
                <textarea name="deskripsi_barang" class="editBarang form-control" rows="3">
                    {{ old('deskripsi_barang', $barang['0']->deskripsi_barang) }}
                </textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('.editBarang'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
                @error('deskripsi_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">stok_barang</x-slot>
                    Stok Barang
                </x-label>
                <input type="number" name="stok_barang" id="stok_barang" class="form-control"
                    value="{{ old('stok_barang', $barang['0']->stok_barang) }}" min="1">
                @error('stok_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">harga_barang</x-slot>
                    Harga Barang
                </x-label>
                <input type="number" name="harga_barang" id="harga_barang" class="form-control"
                    value="{{ old('harga_barang', $barang['0']->harga_barang) }}" min="1">
                @error('harga_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <div class="label-gambar d-flex justify-content-between align-items-center mt-3">
                    <label for="foto_barang" class="form-label fw-bold">Foto Barang</label>
                    <button id="clear_image" type="button" onclick="clearImage()"
                        class="d-none badge bg-danger border-0 fs-6 fw-normal mb-2">
                        <i class="fa fa-trash me-1"></i>
                        Hapus Gambar
                    </button>
                </div>
                <input name="foto_barang" type="file" id="foto_barang" class="form-control input-image"
                    onchange="preview()">
                <img id="frame" style="width: 150px" src="{{ asset('storage/images/' . $barang['0']->foto_barang) }}"
                    alt="{{ $barang['0']->foto_barang }}" class="img-fluid mt-3 mb-3 imgPreview" />
                <x-modal-zoom-image></x-modal-zoom-image>
                <br>
                @error('foto_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror

                <div class="mt-2">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>

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
                    clear_image.classList.add("d-none");
                    frame.src = "";
                    frame.alt = "";
                }
            </script>
        </form>
    </x-form-card>
</x-app-layout>
