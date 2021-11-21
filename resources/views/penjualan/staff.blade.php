<x-app-layout title="Pendataan Penjualan Staff">
    <h2>Pendataan Penjualan Staff</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('penjualanStaff.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label class="form-label fw-bold">Nama Staff<sup style="color: red">*</sup></label>
                    <select name="staff_id" value="{{ old('staff_id') }}" class="form-select form-select-sm" aria-label=".form-select-sm" required>
                        <option value="" selected disabled>Pilih Staff</option>
                        @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->nama_staff }}</option>
                        @endforeach
                    </select>
                    @error('staff_id')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-2">Nama Barang<sup style="color: red">*</sup></label>
                    <select name="nama_barang" value="{{ old('nama_barang') }}" class="form-select form-select-sm" aria-label=".form-select-sm">
                        <option value="" selected disabled>Pilih barang</option>
                        @foreach($stocks as $stock)
                            <option value="{{ $stock->nama_barang }}">{{ $stock->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
                    
                    <label for="jumlah_penjualan" class="form-label fw-bold mt-2">
                        Jumlah Penjualan<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_penjualan') }}" name="jumlah_penjualan" class="form-control" id="jumlah_penjualan">
                    @error('jumlah_penjualan')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="tanggal_penjualan" class="form-label fw-bold mt-2">
                        Tanggal Penjualan<sup style="color: red">*</sup>
                    </label>
                    <input type="date" name="tanggal_penjualan" value="{{ old('tanggal_penjualan') }}" class="form-control" id="tanggal_penjualan">
                    @error('tanggal_penjualan')
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
