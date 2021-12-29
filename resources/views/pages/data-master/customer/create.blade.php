<x-app-layout title="Penambahan Data Customer">
    <h2 class="m-0">Penambahan Data Customer</h2>

    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('customer.store') }}" class="row g-3">
            @csrf
            <div class="col-6">
                <label for="nama_customer" class="form-label fw-bold">
                    Nama Customer<sup style="color: red">*</sup>
                </label>
                <input type="text" name="nama_customer" value="{{ old('nama_customer') }}" class="form-control"
                    id="nama_customer">
                @error('nama_customer')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <label for="inputAddress" class="form-label fw-bold mt-2">
                    Daerah<sup style="color: red">*</sup>
                </label>
                <select name="kategori_daerah" value="{{ old('kategori_daerah') }}" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    <option value="" selected disabled>Pilih Kategori</option>
                    <option value="Gunung" {{ old('kategori_daerah') == 'Gunung' ? 'selected' : '' }}>Gunung</option>
                    <option value="Medan" {{ old('kategori_daerah') == 'Medan' ? 'selected' : '' }}>Medan</option>
                    <option value="Lainnya" {{ old('kategori_daerah') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                @error('kategori_daerah')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <label for="alamat_customer" class="form-label fw-bold mt-2">
                    Alamat Customer<sup style="color: red">*</sup>
                </label>
                <input type="text" name="alamat_customer" value="{{ old('alamat_customer') }}" class="form-control"
                    id="alamat_customer">
                @error('alamat_customer')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <label for="typePhone" class="form-label fw-bold mt-2">
                    No HP Costumer<sup style="color: red">*</sup>
                </label>
                <input type="tel" name="telp_customer" value="{{ old('telp_customer') }}" id="typePhone"
                    class="form-control" />
                @error('telp_customer')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-paper-plane me-1"></i>
                    Submit
                </button>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
