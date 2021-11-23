<x-app-layout title="Pendataan Pembelian Customer">
    <h2 class="m-0">Pendaataan Pembelian Customer</h2>

    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('pembelianCustomer.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="inputAddress" class="form-label fw-bold">
                        Nama Customer<sup style="color: red">*</sup>
                    </label>
                    <select name="customer_id" class="form-select form-select-sm" aria-label=".form-select-sm" required>
                        <option value="" selected disabled>Pilih Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ (old("customer_id") == $customer->id ? "selected":"") }}>{{ $customer->nama_customer }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="inputAddress" class="form-label fw-bold mt-2">
                        Nama Barang<sup style="color: red">*</sup>
                    </label>
                    <select name="nama_barang" value="{{ old('nama_barang') }}" class="form-select form-select-sm" aria-label=".form-select-sm">
                        <option value="" selected disabled>Pilih barang</option>
                        @foreach($stocks as $stock)
                            <option value="{{ $stock->nama_barang }}" {{ (old("nama_barang") == $stock->nama_barang ? "selected":"") }}>{{ $stock->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jumlah_pembelian" class="form-label fw-bold mt-2">
                        Jumlah<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_pembelian') }}" name="jumlah_pembelian" class="form-control" id="jumlah_pembelian">
                    @error('jumlah_pembelian')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="tanggal_masuk" class="form-label fw-bold mt-2">
                        Tanggal Masuk<sup style="color: red">*</sup>
                    </label>
                    <input type="date" min="1" value="{{ old('tanggal_masuk') }}" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
                    @error('tanggal_masuk')
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
