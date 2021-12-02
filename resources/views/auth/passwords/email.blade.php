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
                            @if (session('status'))
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </symbol>
                                </svg>
                                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                                    style="height: 56px;" role="alert">
                                    <svg class="bi flex-shrink-0 me-3" role="img" width="24px" aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column">
                                @csrf

                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label fw-bold" style="color: #607080;">
                                            Alamat Email<sup style="color: red">*</sup>
                                        </label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="off" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fa fa-paper-plane me-1"></i>
                                            Kirim link reset password
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
