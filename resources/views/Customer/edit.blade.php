<x-app-layout title="Edit Data Customer">
    <x-alert-success></x-alert-success>
    <h2>Pengubahan Data Customer</h2>
    <form method="POST" action="{{ route('dataCustomer.update', $customers->id) }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">
            <label for="nama_customer" class="form-label @error('name') is-invalid @enderror">Nama Customer</label>
            <input type="text" name="nama_customer" value="{{ old('nama_customer', $customers->nama_customer) }}" class="form-control"
                id="nama_customer" placeholder="">
                            @error('nama_customer')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>
                        
            <label for="inputAddress" class="form-label">Daerah</label>
            <select name="kategori_daerah" value="{{ old('kategori_daerah') }}" class="form-select"
                                id="inputGroupSelect01">
                <option selected>Pilih Kategori</option>
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
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="alamat_customer" class="form-label @error('alamat') is-invalid @enderror">Alamat Customer</label>
            <input type="text" name="alamat_customer" value="{{ old('alamat_customer', $customers->alamat_customer) }}" class="form-control"
                id="alamat_customer" placeholder="">
            @error('alamat_customer')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label class="form-label @error('typePhone') is-invalid @enderror" for="typePhone">No Telp Costumer</label>
            <input type="tel" name="telp_customer" value="{{ old('telp_customer', $customers->telp_customer) }}" id="typePhone" class="form-control" />
            @error('telp_customer')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
        </div>
    </form>
</x-app-layout>