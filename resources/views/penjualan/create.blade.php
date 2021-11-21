<x-app-layout title="Pendataan Penjualan Barang">
    <h2>Pendataan Penjualan Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('penjualanBarang.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-9 m-0">
                <div class="container-fluid">
                    <label for="tanggal_keluar" class="form-label fw-bold">
                        Tanggal Keluar<sup style="color: red">*</sup>
                    </label>
                    <input type="date" min="1" value="{{ old('tanggal_keluar') }}" name="tanggal_keluar" class="form-control" id="tanggal_masuk">
                    @error('tanggal_keluar')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="inputAddress" class="form-label fw-bold">Nama barang<sup style="color: red">*</sup></label>
                    <select name="nama_barang" class="form-select form-select-sm" aria-label=".form-select-sm">
                        <option value="" selected disabled>Pilih Barang</option>
                        @foreach($stocks as $stock)
                            @if ($stock->jumlah_barang == 0)
                                <option value="{{ $stock->nama_barang }}" disabled>{{$stock->nama_barang}} (stok kosong)</option>
                            @else
                                <option value="{{ $stock->nama_barang }}" {{ (old("nama_barang") == $stock->nama_barang ? "selected":"") }}>{{ $stock->nama_barang }}  ({{ $stock->jumlah_barang }} dus)</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jumlah_barang" class="form-label fw-bold">
                        Jumlah barang yang keluar<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_barang') }}" name="jumlah_barang" class="form-control" id="jumlah_barang">
                    @error('jumlah_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
