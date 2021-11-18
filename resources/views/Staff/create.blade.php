<x-app-layout title="Tambah Stok">
    <h2>Penambahan Data Staff</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('DataStaff.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama_staff" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama_staff" id="nama_barang" value="{{ old('nama_staff') }}" class="form-control">
                    @error('nama_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                    <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Pria">
                            <label for="jenis_kelamin" class="form-check-label" for="inlineRadio1">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Wanita">
                                <label for="jenis_kelamin" class="form-check-label" for="inlineRadio2">Wanita</label>
                        </div>
                    @error('jenis_kelamin')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror    
                    <br><br>

                    <label for="tanggal_lahir" class="form-label mt-3 fw-bold">Tanggal Lahir</label>
                        <input type="date" min="1" value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" class="form-control"
                        id="tanggal_lahir" placeholder="">
                    @error('tanggal_lahir')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="alamat_staff" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat_staff" id="alamat_barang" value="{{ old('alamat_staff') }}" class="form-control">
                    @error('alamat_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="email_staff" class="form-label fw-bold">Email</label>
                    <input id="email_staff" name="email_staff" type="email" value="{{ old('email_staff') }}" class="input form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" aria-label="email" aria-describedby="basic-addon1" required autocomplete="off" />
                    @error('email_staff')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label class="form-label fw-bold @error('typePhone') is-invalid @enderror" for="typePhone">No Telp</label>
                    <input type="tel" name="telp_staff" value="{{ old('telp_staff') }}" id="typePhone" class="form-control" />
                    @error('telp_staff')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </div>

            <!-- untuk preview dan hapus image -->
            <script>
                function preview() {
                    let clear_image = document.getElementById('clear_image');
                    clear_image.classList.remove("d-none");
                    frame.src = URL.createObjectURL(event.target.files[0]);
                    frame.style.width = "150px";
                }
                function clearImage() {
                    let clear_image = document.getElementById('clear_image');
                    clear_image.classList.add("d-none");
                    frame.src = "";
                }
            </script>
        </form>
    </x-form-card>
</x-app-layout>
