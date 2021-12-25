<x-app-layout title="Tambah Barang">
    @push('headScripts')
        <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
    @endpush

    <h2>Tambah Data Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Barang
        </x-slot>

        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">nama_barang</x-slot>
                    Nama Barang
                </x-label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                    value="{{ old('nama_barang') }}">
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
                    <option selected disabled>Pilih Kategori</option>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('kategori_barang') == $category->id ? 'selected' : '' }}>
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
                <textarea name="deskripsi_barang" class="editor form-control" rows="3">
                    {{ old('deskripsi_barang') }}
                </textarea>
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

                <x-label>
                    <x-slot name="label_for">stok_barang</x-slot>
                    Stok Barang
                </x-label>
                <input type="number" name="stok_barang" id="stok_barang" class="form-control"
                    value="{{ old('stok_barang') }}" min="1">
                @error('stok_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">harga_barang</x-slot>
                    Harga Barang
                </x-label>
                <input type="number" name="harga_barang" id="harga_barang" class="form-control"
                    value="{{ old('harga_barang') }}" min="1">
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
                @error('foto_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <img id="frame" src="" class="img-fluid mt-3 mb-3 imgPreview" alt="" />
                <x-modal-zoom-image></x-modal-zoom-image>
                <br>

                <div class="mt-2">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>

            <!-- untuk preview dan hapus image -->
            <x-script-prev-del-image></x-script-prev-del-image>
        </form>
    </x-form-card>
</x-app-layout>
