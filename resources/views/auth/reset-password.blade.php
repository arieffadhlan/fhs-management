<x-app-layout title="Reset Password">
    @section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
            <x-form-card>
                <x-slot name="title">
                    Reset Password
                </x-slot>
            
                <form method="post" action="{{ route('resetPassword.update') }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <div class="container-fluid">
                            <label for="username" class="form-label fw-bold">Username Akun Anda</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                            @error('username')
                                <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                            @enderror
                            <br>
                            
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
            
                            <div class="form-group row mb-0">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Simpan Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </x-form-card>
        </div>
    </div>
    @endsection
</x-app-layout>