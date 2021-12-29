<x-app-layout title="Ubah Data Customer">
    <h2>Perubahan Data Customer</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('customer.update', $customers->id) }}" class="row g-3">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama_customer" class="form-label fw-bold">
                        Nama Customer<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="nama_customer" value="{{ old('nama_customer', $customers->nama_customer) }}" class="form-control" id="nama_customer">
                    @error('nama_customer')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
            
                    <label for="inputAddress" class="form-label fw-bold mt-2">
                        Daerah<sup style="color: red">*</sup>
                    </label>
                    <select name="kategori_daerah" value="{{ old('kategori_daerah') }}" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @if($customers->kategori_daerah == "Gunung")
                            <option value="Medan">Medan</option>
                            <option value="Gunung" selected>Gunung</option>
                            <option value="Lainnya">Lainnya</option>
                        @elseif($customers->kategori_daerah == "Medan")
                            <option value="Medan" selected>Medan</option>
                            <option value="Gunung">Gunung</option>
                            <option value="Lainnya">Lainnya</option>
                        @elseif($customers->kategori_daerah == "Lainnya")
                            <option value="Medan">Medan</option>
                            <option value="Gunung">Gunung</option>
                            <option value="Lainnya" selected>Lainnya</option>
                        @else
                            <option value="Gunung">Gunung</option>
                            <option value="Medan">Medan</option>
                            <option value="Lainnya">Lainnya</option>
                        @endif
                    </select>
                    @error('kategori_daerah')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="alamat_customer" class="form-label fw-bold mt-2">
                        Alamat Customer<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="alamat_customer" value="{{ old('alamat_customer', $customers->alamat_customer) }}" class="form-control" id="alamat_customer">
                    @error('alamat_customer')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="typePhone" class="form-label fw-bold mt-2">
                        No Telp Costumer<sup style="color: red">*</sup>
                    </label>
                    <input type="tel" name="telp_customer" value="{{ old('telp_customer', $customers->telp_customer) }}" id="typePhone" class="form-control" />
                    @error('telp_customer')
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