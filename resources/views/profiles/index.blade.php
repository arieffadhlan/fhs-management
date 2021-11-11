<x-app-layout title="Profil">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h2>Profil</h2>
    <div class="card border border-1 mt-4">
        <div class="card-header fs-5 text-black">
            Profile Pengguna
            <hr>
        </div>
        <div class="card-body">
            <div class="col-md-7 d-flex align-items-center pb-3">
                @isset(Auth::user()->image)
                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @else
                <img src="{{ asset("images/user.png") }}" alt="Avatar" class="rounded-circle" width="100px" height="100px">
                @endisset
                <div class="profile-photo d-flex flex-column justify-content-start align-items-start ms-4">
                    <button type="button" class="badge bg-primary border-0 fs-6 fw-normal px-3 py-2" data-bs-toggle="modal" data-bs-target="#edit-foto">
                            Edit Foto
                    </button>
                    <small class="mt-2" style="font-size: 13px;">Foto sebaiknya berukuran tidak lebih dari 2mb.</small>
                    @error('image')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-md-9">
                    <div class="container-fluid">
                        <label for="fullname" class="form-label fw-bold mt-3">Nama Lengkap</sup></label>
                        <input type="text" value="{{ Auth::user()->fullname }}" name="fullname" class="form-control" id="fullname">
                        @error('fullname')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
        
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control" id="username">
                        @error('username')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
        
                        <label for="email" class="form-label fw-bold">Alamat E-mail</label>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" id="email">
                        @error('email')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card border border-1 mt-4">
        <div class="card-header fs-5 text-black">
            Ubah Password
            <hr>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-md-9">
                    <div class="container-fluid">
                        <label for="password" class="form-label fw-bold">Password Baru</label>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="input form-control" aria-label="password" aria-describedby="basic-addon1" required autocomplete="off" />
                            <span class="input-group-text" onclick="password_show_hide();">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                        @error('password')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <small class="mt-2" style="font-size: 13px;">
                            Gunakan minimal 8 karakter dengan kombinasi huruf dan angka.
                        </small>
                        <br><br>

                        <label for="password-confirm" class="form-label fw-bold">Konfirmasi Password</label>
                        <div class="input-group">
                            <input id="password-confirm" name="password_confirmation" type="password" class="input form-control" aria-label="password-confirm" aria-describedby="basic-addon1" required autocomplete="off">
                            <span class="input-group-text" onclick="password_confirm_show_hide();">
                                <i class="fas fa-eye" id="confirm_show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                            </span>
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Simpan Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
