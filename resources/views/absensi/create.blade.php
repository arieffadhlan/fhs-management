<x-app-layout title="Tambah Stock">
    <h2>Absensi</h2>
    
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('absensi.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label class="form-label fw-bold mt-3">Tanggal</label>
                    <input type="text" value="{{ now()->format('d F, Y') }} | 8AM - 9AM" name="fullname" class="form-control" disabled>
                    <br>
                    <label class="form-label fw-bold mt-3">Nama Lengkap</label>
                    <input type="text" value="{{ Auth::user()->fullname }}" name="fullname" class="form-control" disabled>
                    <br>
                    
                    <label class="form-label fw-bold mt-3 d-block">Status</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="status1">Hadir</label>
                        <input class="form-check-input" type="radio" name="status" id="status1" value="hadir" required>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="absen" required>
                        <label class="form-check-label" for="status2">Absen</label>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
