<x-app-layout title="Tambah Transaksi">
    <x-alert-error></x-alert-error>
    <h2>Transaksi Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Transaksi
        </x-slot>

        <form method="POST" action="{{ route('transaksi.store') }}">
            @csrf
            <x-form-container>
                <h5 class="fw-bold mb-0">Data Barang</h5>
                <hr class="col-2 mt-2 mb-3">
                <x-label>
                    <x-slot name="label_for">nama_barang</x-slot>
                    Nama Barang
                </x-label>
                <select name="nama_barang" id="nama_barang" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    <option selected disabled>Pilih Barang</option>
                    @if ($barangs->isNotEmpty())
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}"
                                {{ old('nama_barang') == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }} ({{ $barang->stok_barang }} dus)
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('nama_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">status_barang</x-slot>
                    Jenis Transaksi
                </x-label>
                <select name="status_barang" id="status_barang" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    <option selected disabled>Pilih Kategori</option>
                    <option value="masuk" {{ old('status_barang') == 'masuk' ? 'selected' : '' }}>
                        Barang Masuk
                    </option>
                    <option value="keluar" {{ old('status_barang') == 'keluar' ? 'selected' : '' }}>
                        Barang Keluar
                    </option>
                </select>
                @error('status_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">jumlah_transaksi</x-slot>
                    Jumlah Transaksi
                </x-label>
                <input type="number" name="jumlah_transaksi" id="jumlah_transaksi" class="form-control"
                    value="{{ old('jumlah_transaksi') }}" min="1">
                @error('jumlah_transaksi')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <h5 class="fw-bold mt-3 mb-0">Data Pemasok</h5>
                <hr class="col-2 mt-2 mb-3">
                <x-label>
                    <x-slot name="label_for">nama_pemasok</x-slot>
                    Nama Pemasok
                </x-label>
                <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control"
                    value="{{ old('nama_pemasok') }}">
                @error('nama_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">alamat_pemasok</x-slot>
                    Alamat Pemasok
                </x-label>
                <input type="text" name="alamat_pemasok" id="alamat_pemasok" class="form-control"
                    value="{{ old('alamat_pemasok') }}">
                @error('alamat_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">telepon_pemasok</x-slot>
                    Nomor Telepon
                </x-label>
                <input type="tel" name="telepon_pemasok" id="telepon_pemasok" class="form-control"
                    value="{{ old('telepon_pemasok') }}">
                @error('telepon_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <div class="mt-2">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>
        </form>
    </x-form-card>
</x-app-layout>
