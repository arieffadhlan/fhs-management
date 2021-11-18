<x-app-layout title="Absence">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- Content Row -->
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jam</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="txt"></div>
                                <script>
                                    function startTime() {
                                        var today = new Date();
                                        var h = today.getHours();
                                        var m = today.getMinutes();
                                        var s = today.getSeconds();
                                        m = checkTime(m);
                                        s = checkTime(s);
                                        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
                                        var t = setTimeout(startTime, 500);
                                    }

                                    function checkTime(i) {
                                        if (i < 10) {
                                            i = "0" + i
                                        }; // add zero in front of numbers < 10
                                        return i;
                                    }

                                    startTime();
                                </script>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-success text-uppercase mb-1">Tanggal</div>
                                <script type='text/javascript'>
                                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
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
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">
                                <i class="fas fa-fw fa-plus"></i>
                                Add New Absen
                            </button>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-hover table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Kehadiran</th>
                                            <th>Keterangan</th>
                                            <th>Opt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $siswa)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $siswa->nama }}</td>
                                                <td>{{ $siswa->tanggal }}</td>
                                                <td>{{ $siswa->kehadiran }}</td>
                                                <td>{{ $siswa->keterangan }}</td>
                                                <td>
                                                    <a href="/admin/{{ $siswa->id }}/edit">
                                                        <i class="fa fa-edit" style="color: blue;"></i>
                                                    </a>
                                                    <a href="/admin/{{ $siswa->id }}/hapus">
                                                        <i class="fa fa-trash" style="color: red;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Modal Absen-->
    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Absen</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
    <form method="post" action="{{route ('absence.store')}}">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Nama</span>
            </div>
            <input type="text" name="nama" value="{{Auth::user()->username}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Tanggal </span>
            </div>
            <input type="datetime" name="tanggal" value="{{ date('d M Y H:i:s', strtotime(NOW())) }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
        </div>
        
        <div class="input-group mb-3">
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="status1">Hadir</label>
                <input class="form-check-input" type="radio" name="kehadiran" id="status1" value="Hadir" required>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kehadiran" id="status2" value="Izin" required>
                <label class="form-check-label" for="status2">Izin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kehadiran" id="status3" value="Tidak Hadir" required>
                <label class="form-check-label" for="status3">Tidak Hadir</label>
            </div>
        </div>
        

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
            </div>
            </div>
    </div>
</x-app-layout>
