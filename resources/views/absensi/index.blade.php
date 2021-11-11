<x-app-layout title="Absensi">
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
                        </div>
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped table-bordered">
                                <thead class="text-center">
                                    <tr class="table-secondary">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal</th>
                                        <th>Kehadiran</th>
                                        <th>Opt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data as $siswa)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->kelas }}</td>
                                            <td>{{ $siswa->tanggal }}</td>
                                            <td>{{ $siswa->kehadiran }}</td>
                                            <td>
                                                <a href="/admin/{{ $siswa->id }}/edit" class="badge badge-warning"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="/admin/{{ $siswa->id }}/hapus" class="badge badge-danger"><i
                                                        class="fa fa-trash"></i></a>
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
