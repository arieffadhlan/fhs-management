<x-app-layout title="Register">
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header fs-5 fw-bold">Register Form<sup style="color: red">*</div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}" class="d-flex flex-column">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text pt-1 pb-1" id="basic-addon1">
                                           <i class="fas fa-user"></i>
                                        </span>
                                        <input id="fullname" name="fullname" type="text" value="{{ old('fullname') }}" class="input form-control @error('fullname') is-invalid @enderror" placeholder="Full Name" aria-label="fullname" aria-describedby="basic-addon1" required autofocus autocomplete="off" />
                                        
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>      

                                <div class="col-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text pt-1 pb-1" id="basic-addon1">
                                           <i class="fas fa-user"></i>
                                        </span>
                                        <input id="username" name="username" type="text" value="{{ old('username') }}" class="input form-control @error('username') is-invalid @enderror" placeholder="Username (at least 3 characters)" aria-label="name" aria-describedby="basic-addon1" required autocomplete="off" />
                                        
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text pt-1 pb-1" id="basic-addon1">
                                           <i class="fas fa-envelope"></i>
                                        </span>
                                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="input form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" aria-label="email" aria-describedby="basic-addon1" required autocomplete="off" />

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        <input id="password" name="password" type="password" class="input form-control @error('password') is-invalid @enderror" placeholder="Password (at least 8 characters)" aria-label="password" aria-describedby="basic-addon1" required autocomplete="off" />
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        <input id="password-confirm" name="password_confirmation" type="password" class="input form-control" placeholder="Confirm Password" aria-label="password-confirm" aria-describedby="basic-addon1" required autocomplete="off">
                                        <span class="input-group-text" onclick="password_confirm_show_hide();">
                                            <i class="fas fa-eye" id="confirm_show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="confirm_hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 align-self-end">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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