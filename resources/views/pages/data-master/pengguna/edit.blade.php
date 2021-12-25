<x-app-layout title="Edit Pengguna">
    <h2>Ubah Data Pengguna</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Pengguna
        </x-slot>

        <form method="POST" action="{{ route('pengguna.update', $user->id) }}">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="fullname" class="form-label fw-bold">
                        Nama Lengkap<sup style="color: red">*</sup>
                    </label>
                    <input type="text" value="{{ old('fullname', $user->fullname) }}" name="fullname" class="form-control" id="fullname" required>
                    @error('fullname')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="username" class="form-label fw-bold">
                        Username<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" id="username" required>
                    @error('username')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="email" class="form-label fw-bold">
                        Alamat E-mail<sup style="color: red">*</sup>
                    </label>
                    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="email" required>
                    @error('email')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="password" class="form-label fw-bold">
                        Password Baru<sup style="color: red">*</sup>
                    </label>
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="input form-control" aria-label="password" aria-describedby="basic-addon1" autocomplete="off" />
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
                            class="input form-control" aria-label="password-confirm" aria-describedby="basic-addon1" autocomplete="off">
                        <span class="input-group-text" onclick="password_confirm_show_hide();">
                            <i class="fas fa-eye" id="confirm_show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                        </span>
                    </div>
                    <br>

                    <label class="form-label fw-bold mt-2">Hak Akses<sup style="color: red">*</sup></label>
                    <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @if($user->role == "admin")
                            <option value="admin" selected>Admin</option>
                            <option value="user">Staff</option>
                        @elseif($user->role == "user")
                            <option value="admin">Admin</option>
                            <option value="user" selected>Staff</option>
                        @else
                            <option value="admin">Admin</option>
                            <option value="user">Staff</option>
                        @endif
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
