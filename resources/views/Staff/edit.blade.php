<x-app-layout title="Ubah Data Staff">
    <h2>Perubahan Data Staff</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('DataStaff.update', $staff->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama_staff" class="form-label fw-bold">Nama Lengkap<sup style="color: red">*</sup></label>
                    <input type="text" name="nama_staff" id="nama_staff" value="{{ old('nama_staff', $staff->nama_staff) }}" class="form-control">
                    @error('nama_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jenis_kelamin" class="form-label fw-bold">
                        Jenis Kelamin<sup style="color: red">*</sup>
                    </label>
                    <br>
                    <div class="form-check form-check-inline">
                        @if ($staff->jenis_kelamin == "Pria")
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria" checked>
                        @else
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria">
                        @endif
                        <label for="jenis_kelamin" class="form-check-label" for="inlineRadio1">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if ($staff->jenis_kelamin == "Wanita")
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Wanita" checked>
                        @else
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Wanita">
                        @endif
                        <label for="jenis_kelamin" class="form-check-label" for="inlineRadio2">Wanita</label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror    
                    <br><br>

                    <label for="tanggal_lahir" class="form-label mt-3 fw-bold">
                        Tanggal Lahir<sup style="color: red">*</sup>
                    </label>
                    <input type="date" min="1" value="{{ old('tanggal_lahir', $staff->tanggal_lahir) }}" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                    @error('tanggal_lahir')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="alamat_staff" class="form-label fw-bold">Alamat<sup style="color: red">*</sup></label>
                    <input type="text" name="alamat_staff" id="alamat_barang" value="{{ old('alamat_staff', $staff->alamat_staff) }}" class="form-control">
                    @error('alamat_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="email_staff" class="form-label fw-bold">Email<sup style="color: red">*</sup></label>
                    <input id="email_staff" name="email_staff" type="email" value="{{ old('email_staff', $staff->email_staff) }}" class="input form-control" />
                    @error('email_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label class="form-label fw-bold" for="typePhone">No Telp<sup style="color: red">*</sup></label>
                    <input type="tel" name="telp_staff" value="{{ old('telp_staff', $staff->telp_staff) }}" id="typePhone" class="form-control" />
                    @error('telp_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
