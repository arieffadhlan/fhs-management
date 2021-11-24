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
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <label for="password" class="form-label fw-bold mt-3" style="color: #607080;">
                                            Password Baru<sup style="color: red">*</sup>
                                        </label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <label for="password-confirm" class="form-label fw-bold mt-3"
                                            style="color: #607080;">
                                            Konfirmasi Password<sup style="color: red">*</sup>
                                        </label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
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
