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
                                <div class="alert alert-success" role="alert">
                                    link verifikasi baru telah dikirim ke alamat email Anda.
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
