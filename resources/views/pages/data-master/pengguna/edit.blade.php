<x-app-layout title="Edit Pengguna">
    <h2>Ubah Data Pengguna</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Pengguna
        </x-slot>

        <form method="POST" action="{{ route('pengguna.update', $user->id) }}">
            @method('put')
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">fullname</x-slot>
                    Nama Lengkap
                </x-label>
                <input type="text" value="{{ old('fullname', $user->fullname) }}" name="fullname"
                    class="form-control" id="fullname" required>
                @error('fullname')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">username</x-slot>
                    Username
                </x-label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                    class="form-control" id="username" required>
                @error('username')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">email</x-slot>
                    Alamat E-mail
                </x-label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                    id="email" required>
                @error('email')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">password</x-slot>
                    Password Baru
                </x-label>
                <div class="input-group">
                    <input id="password" name="password" type="password" class="input form-control" aria-label="password"
                        aria-describedby="basic-addon1" autocomplete="off" />
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
                        aria-label="password-confirm" aria-describedby="basic-addon1" autocomplete="off">
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
                <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm">
                    @if ($user->role == 'admin')
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

                <x-label>
                    <x-slot name="label_for">status</x-slot>
                    Status
                </x-label>
                <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm">
                    @if ($user->status == 'Aktif')
                        <option value="Aktif" selected>Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    @elseif($user->status == "Tidak Aktif")
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif" selected>Tidak Aktif</option>
                    @else
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    @endif
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
