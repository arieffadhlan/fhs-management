<x-app-layout title="Perubahan Data Pembelian Customer">
    <h2>Perubahan Data Pembelian Customer</h2>

    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('pembelianCustomer.update', $pembelians->id) }}"
            enctype="multipart/form-data" class="row g-3">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label class="form-label fw-bold">Nama Customer<sup style="color: red">*</sup></label>
                    <select name="customer_id" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @foreach ($customers as $customer)
                            @if ($pembelians->customer_id == $customer->id)
                                <option value="{{ $customer->id }}" selected>{{ $customer->nama_customer }}</option>
                            @else
                                <option value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold mt-2">Nama Barang<sup style="color: red">*</sup></label>
                    <select name="nama_barang" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @foreach ($stocks as $stock)
                            @if ($pembelians->nama_barang == $stock->nama_barang)
                                <option value="{{ $stock->nama_barang }}" selected>{{ $stock->nama_barang }}
                                </option>
                            @else
                                <option value="{{ $stock->nama_barang }}">{{ $stock->nama_barang }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jumlah_pembelian" class="form-label fw-bold mt-2">
                        Jumlah Pembelian<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_pembelian', $pembelians->jumlah_pembelian) }}"
                        name="jumlah_pembelian" class="form-control" id="jumlah_pembelian">
                    @error('jumlah_pembelian')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="tanggal_masuk" class="form-label fw-bold mt-2">
                        Tanggal Masuk<sup style="color: red">*</sup>
                    </label>
                    <input type="date" value="{{ old('tanggal_masuk', $pembelians->tanggal_masuk) }}"
                        name="tanggal_masuk" class="form-control" id="tanggal_masuk">
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
