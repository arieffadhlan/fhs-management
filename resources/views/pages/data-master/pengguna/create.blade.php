<x-app-layout title="Tambah Pengguna">
    <h2>Tambah Data Pengguna</h2>
    <x-form-card>
        <x-slot name="title">
            Data Pengguna
        </x-slot>

        <form method="POST" action="{{ route('pengguna.store') }}">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="fullname" class="form-label fw-bold">
                        Nama Lengkap<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="John Doe" value="{{ old('fullname') }}" required>
                    @error('fullname')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="username" class="form-label fw-bold">
                        Username<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="johndoe" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="email" class="form-label fw-bold">
                        Alamat E-mail<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="password" class="form-label fw-bold">
                        Password Baru<sup style="color: red">*</sup>
                    </label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="input form-control aria-label="password" aria-describedby="basic-addon1" autocomplete="off" required />
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

                    <label for="password-confirm" class="form-label fw-bold">
                        Konfirmasi Password<sup style="color: red">*</sup>
                    </label>
                    <div class="input-group">
                        <input id="password-confirm" name="password_confirmation" type="password"
                            class="input form-control" aria-label="password-confirm" aria-describedby="basic-addon1" autocomplete="off" required>
                        <span class="input-group-text" onclick="password_confirm_show_hide();">
                            <i class="fas fa-eye" id="confirm_show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                        </span>
                    </div>
                    <br>

                    <label for="role" class="form-label fw-bold">
                        Hak Akses<sup style="color: red">*</sup>
                    </label>
                    <select name="role" id="role" class="form-select form-select-sm" aria-label=".form-select-sm" required>
                        <option value="" selected disabled>Pilih hak akses</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                            Staff
                        </option>
                    </select>
                    @error('role')
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
