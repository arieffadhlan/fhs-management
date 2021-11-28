<x-app-layout title="Reset Password">
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow">
                        <div class="card-header fs-5 fw-bold" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                            {{ __('Reset Password') }}
                        </div>

                        <div class="card-body pt-4">
                            <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-bold" style="color: #607080;">
                                            Alamat Email<sup style="color: red">*</sup>
                                        </label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                        @enderror

                                        <label for="password" class="form-label fw-bold mt-3" style="color: #607080;">
                                            Password Baru<sup style="color: red">*</sup>
                                        </label>
                                        <div class="input-group">
                                            <input id="password" name="password" type="password" class="input form-control"
                                                placeholder="(minimal 8 karakter)" aria-label="password"
                                                aria-describedby="basic-addon1" required autocomplete="off" />
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>

                                        @error('password')
                                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                        @enderror

                                        <label for="password-confirm" class="form-label fw-bold mt-3"
                                            style="color: #607080;">
                                            Konfirmasi Password<sup style="color: red">*</sup>
                                        </label>
                                        <div class="input-group">
                                            <input id="password-confirm" name="password_confirmation" type="password"
                                                class="input form-control" aria-label="password-confirm"
                                                aria-describedby="basic-addon1" required autocomplete="off">
                                            <span class="input-group-text" onclick="password_confirm_show_hide();">
                                                <i class="fas fa-eye" id="confirm_show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
