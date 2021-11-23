<x-app-layout title="Registrasi">
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header fs-5 fw-bold">Form Registrasi</div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}" class="d-flex flex-column">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 mb-1">
                                    <label for="fullname" class="form-label fw-bold">
                                        Nama Lengkap<sup style="color: red">*</sup>
                                    </label>
                                    <input id="fullname" name="fullname" type="text" value="{{ old('fullname') }}" class="input form-control" aria-label="fullname" aria-describedby="basic-addon1" required autofocus autocomplete="off" />                    
                                    @error('fullname')
                                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                    @enderror 

                                    <label for="username" class="form-label fw-bold mt-4">
                                        Username<sup style="color: red">*</sup>
                                    </label>
                                    <input id="username" name="username" type="text" value="{{ old('username') }}" class="input form-control" placeholder="(minimal 3 karakter)" aria-label="name" aria-describedby="basic-addon1" required autocomplete="off" />
                                    @error('username')
                                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    <label for="email" class="form-label fw-bold mt-4">
                                        Alamat Email<sup style="color: red">*</sup>
                                    </label>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="input form-control" aria-label="email" aria-describedby="basic-addon1" required autocomplete="off" />
                                    @error('email')
                                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    <label for="password" class="form-label fw-bold mt-4">
                                        Password<sup style="color: red">*</sup>
                                    </label>
                                    <div class="input-group">
                                        <input id="password" name="password" type="password" class="input form-control" placeholder="(minimal 8 karakter)" aria-label="password" aria-describedby="basic-addon1" required autocomplete="off" />
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    <label for="password_confirmation" class="form-label fw-bold mt-4">
                                        Konfirmasi Password<sup style="color: red">*</sup>
                                    </label>
                                    <div class="input-group">
                                        <input id="password-confirm" name="password_confirmation" type="password" class="input form-control" aria-label="password-confirm" aria-describedby="basic-addon1" required autocomplete="off">
                                        <span class="input-group-text" onclick="password_confirm_show_hide();">
                                            <i class="fas fa-eye" id="confirm_show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 mb-0">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 text-center">
                                Sudah punya akun? Silakan <a class="btn btn-link text-decoration-none p-0 border-0" href="{{ route('login') }}">{{ __('login') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>