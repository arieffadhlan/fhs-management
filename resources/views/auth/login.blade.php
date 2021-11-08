<x-app-layout title="Login">
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header fs-5 fw-bold">Login Form<sup style="color: red">*</div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}" class="d-flex flex-column">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-text pt-1 pb-1" id="basic-addon1">
                                           <i class="fas fa-user"></i>
                                        </span>
                                        <input id="username" name="username" type="text" value="{{ old('username') }}" class="input form-control @error('username') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required autofocus />

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>      
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" />
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
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-12">

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                    <div class="form-check">
                                        <div class="form-check-remember-me mt-3">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 align-self-end">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
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