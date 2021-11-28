<x-app-layout title="Perubahan Data Penjualan Barang">
    <h2>Perubahan Data Penjualan Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('penjualanBarang.update', $penjualan->id) }}"
            enctype="multipart/form-data" class="row g-3">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="tanggal_keluar" class="form-label fw-bold">
                        Tanggal Keluar<sup style="color: red">*</sup>
                    </label>
                    <input type="date" value="{{ old('tanggal_keluar', $penjualan->tanggal_keluar) }}"
                        name="tanggal_keluar" class="form-control" id="tanggal_masuk">
                    @error('tanggal_keluar')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="inputAddress" class="form-label fw-bold mt-2">
                        Nama barang<sup style="color: red">*</sup>
                    </label>
                    <select name="nama_barang" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @foreach ($stocks as $stock)
                            @if ($penjualan->nama_barang == $stock->nama_barang)
                                <option value="{{ $stock->nama_barang }}" selected>{{ $stock->nama_barang }}</option>
                            @else
                                <option value="{{ $stock->nama_barang }}">{{ $stock->nama_barang }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jumlah_barang" class="form-label fw-bold mt-2">
                        Jumlah barang yang keluar<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_barang', $penjualan->jumlah_barang) }}"
                        name="jumlah_barang" class="form-control" id="jumlah_barang">
                    @error('jumlah_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-paper-plane me-1"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
