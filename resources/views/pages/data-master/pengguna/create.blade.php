<x-app-layout title="Tambah Pengguna">
    <h2>Tambah Data Pengguna</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Pengguna
        </x-slot>

        <form method="POST" action="{{ route('pengguna.store') }}">
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">fullname</x-slot>
                    Nama Lengkap
                </x-label>
                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="John Doe"
                    value="{{ old('fullname') }}" required>
                @error('fullname')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">username</x-slot>
                    Username
                </x-label>
                <input type="text" name="username" id="username" class="form-control" placeholder="johndoe"
                    value="{{ old('username') }}" required>
                @error('username')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">email</x-slot>
                    Alamat E-mail
                </x-label>
                <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">password</x-slot>
                    Password Baru
                </x-label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="input form-control aria-label=" password"
                        aria-describedby="basic-addon1" autocomplete="off" required />
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

                <x-label>
                    <x-slot name="label_for">password-confirm</x-slot>
                    Konfirmasi Password
                </x-label>
                <div class="input-group">
                    <input id="password-confirm" name="password_confirmation" type="password" class="input form-control"
                        aria-label="password-confirm" aria-describedby="basic-addon1" autocomplete="off" required>
                    <span class="input-group-text" onclick="password_confirm_show_hide();">
                        <i class="fas fa-eye" id="confirm_show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                    </span>
                </div>
                <br>

                <x-label>
                    <x-slot name="label_for">role</x-slot>
                    Hak Akses
                </x-label>
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

                <x-label>
                    <x-slot name="label_for">status</x-slot>
                    Status
                </x-label>
                <select name="status" id="status" class="form-select form-select-sm" aria-label=".form-select-sm"
                    required>
                    <option value="" selected disabled>Pilih status</option>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>
                </select>
                @error('status')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <div class="mt-2">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>
        </form>
    </x-form-card>
</x-app-layout>
