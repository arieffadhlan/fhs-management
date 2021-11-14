<x-app-layout title="Absensi">
    <x-alert-success></x-alert-success>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-body-title d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold text-primary">Jam</h5>
                                    <i class="fas fa-clock fa-lg"></i>
                                </div>
                                <h4 class="d-flex justify-content-center mt-4 font-weight-bold" id="show-clock">
                                    <script type='text/javascript'>
                                        function startTime() {
                                            let today = new Date();
                                            let h = today.getHours();
                                            let m = today.getMinutes();
                                            let s = today.getSeconds();
                                            m = checkTime(m);
                                            s = checkTime(s);
                                            document.getElementById('show-clock').innerHTML = h + ":" + m + ":" + s;
                                            let t = setTimeout(startTime, 500);
                                        }

                                        function checkTime(i) {
                                            if (i < 10) {
                                                i = "0" + i
                                            }; // add zero in front of numbers < 10
                                            return i;
                                        }

                                        startTime();
                                    </script>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-body-title d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold text-primary">Tanggal</h5>
                                    <i class="bi bi-calendar-date-fill fa-lg"></i>
                                </div>
                                <h5 class="d-flex justify-content-center mt-4 font-weight-bold" id="show-clock">
                                    <script type='text/javascript'>
                                        var months = [
                                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                                            'November', 'Desember'
                                        ];
                                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth();
                                        var thisDay = date.getDay(),
                                            thisDay = myDays[thisDay];
                                        var yy = date.getYear();
                                        var year = (yy < 1000) ? yy + 1900 : yy;
                                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                    </script>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow py-2">
                    <div class="card-body">
                        <div class="card-body-title d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-primary">Data Absen</h5>
                            <a class="btn btn-primary" href="{{ route('absensi.create') }}" role="button">Tambah Absensi</a>
                        </div>
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped table-bordered">
                                <thead class="text-center">
                                    <tr class="table-secondary">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Kehadiran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php $no = 1; @endphp
                                    @foreach ($absensis as $absensi)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $absensi->nama }}</td>
                                            <td>{{ $absensi->tanggal }}</td>
                                            <td>{{ $absensi->kehadiran }}</td>
                                            <td>
                                                @if ($absensi->status == 'hadir')
                                                    <span class="badge bg-primary">
                                                        {{ ucwords($absensi->status) }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        {{ ucwords($absensi->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
