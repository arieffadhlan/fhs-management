<x-app-layout title="Ubah Data Absensi">
    <h2>Perubahan Data Absensi</h2>
    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>

        <form method="POST" action="{{ route('absensi.update', $absensi->id) }}">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="nama" class="form-label fw-bold">Nama</label>
                    <input type="text" name="nama" value="{{ Auth::user()->fullname }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                    @error('nama_staff')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
        
                    <label for="tanggal" class="form-label fw-bold mt-2">Tanggal</label>
                    <input type="datetime" name="tanggal" value="{{ date('d F Y H:i:s', strtotime(NOW())) }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                    <br>
                    
                    <label for="kehadiran" class="form-label fw-bold mt-2">Status</label>
                    <div class="input-group d-flex flex-column">
                        <div class="form-check form-check-inline mb-2">
                            @if ($absensi->kehadiran == "Hadir")
                                <input class="form-check-input" type="radio" name="kehadiran" id="status1" value="Hadir" checked required>
                                <label class="form-check-label" for="status1">Hadir</label>
                                @else
                                <input class="form-check-input" type="radio" name="kehadiran" id="status1" value="Hadir" required>
                                <label class="form-check-label" for="status1">Hadir</label>
                            @endif
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            @if ($absensi->kehadiran == "Izin")
                                <input class="form-check-input" type="radio" name="kehadiran" id="status2" value="Izin" required checked>
                                <label class="form-check-label" for="status2">Izin</label>
                            @else
                                <input class="form-check-input" type="radio" name="kehadiran" id="status2" value="Izin" required>
                                <label class="form-check-label" for="status2">Izin</label>
                            @endif
                        </div>
                        <div class="form-check form-check-inline">
                            @if ($absensi->kehadiran == "Izin")
                                <input class="form-check-input" type="radio" name="kehadiran" id="status3" value="Tidak Hadir" required required>
                                <label class="form-check-label" for="status3">Tidak Hadir</label>
                            @else
                                <input class="form-check-input" type="radio" name="kehadiran" id="status3" value="Tidak Hadir" required>
                                <label class="form-check-label" for="status3">Tidak Hadir</label>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-paper-plane me-1"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
