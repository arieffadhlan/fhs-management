<x-app-layout title="Verifikasi Email">
    @section('content')
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Verifikasi Alamat Email Anda</h4>
                        </div>

                        <div class="card-body">
                            @if (session('resent'))
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
                                    Link verifikasi baru telah dikirim ke alamat email Anda.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            Sebelum melanjutkan, harap periksa email Anda pada bagian kontak masuk atau spam untuk tautan
                            verifikasi. Jika Anda tidak menerima
                            email, maka
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                    klik di sini
                                </button>
                                untuk mengirim ulang verifikasi.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
