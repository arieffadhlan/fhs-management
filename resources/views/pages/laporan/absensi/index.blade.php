<x-app-layout title="Absensi">
    <x-alert-success></x-alert-success>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if (Auth::user()->role == 'admin')
                <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
            @else
                <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
            @endif
        </div>
        <div class="row">
            <x-form-card>
                <x-slot name="title">
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Auth::user()->role == 'admin')
                            Laporan Absensi
                        @else
                            Absensi
                            @php
                                $awalHari = Carbon\Carbon::NOW()->startOfDay();
                                $mulaiAbsen = Carbon\Carbon::createFromTime(7, 0, 0);
                            @endphp

                            @if ($absensis->isNotEmpty())
                                @foreach ($userAbsensis as $userAbsensi)
                                    @if (date('d-m-Y', strtotime($userAbsensi->tanggal)) == date('d-m-Y', strtotime('today')))
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#Add" disabled>
                                            <i class="fas fa-fw fa-plus"></i>
                                            Isi Absensi
                                        </button>
                                    @break
                                @endif

                                @if ($loop->last && date('d-m-Y', strtotime($userAbsensi->tanggal)) != date('d-m-Y', strtotime('today')))
                                    @if (NOW() >= $awalHari && NOW() < $mulaiAbsen)
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#Add" disabled>
                                            <i class="fas fa-fw fa-plus"></i>
                                            Isi Absensi
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#Add">
                                            <i class="fas fa-fw fa-plus"></i>
                                            Isi Absensi
                                        </button>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @if (NOW() >= $awalHari && NOW() < $mulaiAbsen)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Add" disabled>
                                    <i class="fas fa-fw fa-plus"></i>
                                    Isi Absensi
                                </button>
                            @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Add">
                                    <i class="fas fa-fw fa-plus"></i>
                                    Isi Absensi
                                </button>
                            @endif
                        @endif
                        @endif
                    </div>
                </x-slot>

                @if ($absensis->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered" id="tableAbsensi">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Kehadiran</th>
                                    <th>Keterangan</th>
                                    @if (Auth::user()->username == 'admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->username == 'admin')
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($absensis as $absensi)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td style="width: 20px;">{{ $absensi->nama }}</td>
                                            <td>{{ $absensi->tanggal }}</td>
                                            <td>{{ $absensi->kehadiran }}</td>
                                            <td>{{ $absensi->keterangan }}</td>
                                            <td>
                                                <a class="badge bg-success border-0 text-white fw-normal"
                                                    href="{{ route('absensi.edit', $absensi->id) }}" role="button">
                                                    <i class="fa fa-edit"></i>
                                                    Ubah
                                                </a>
                                                <button type="button" class="badge bg-danger border-0 fw-normal"
                                                    style="font-size: 14px;" data-bs-toggle="modal"
                                                    data-bs-target="#modalDelete{{ $absensi->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <x-modal-delete>
                                                    <x-slot name="id">{{ $absensi->id }}</x-slot>
                                                    <x-slot name="delete_label">Data Absensi</x-slot>
                                                    <x-slot name="delete_action">
                                                        {{ route('absensi.delete', $absensi->id) }}
                                                    </x-slot>
                                                </x-modal-delete>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @php
                                        $no = 1;
                                        $filteredAbsensis = $absensis->filter(function ($value, $key) {
                                            return $value->nama == Auth::user()->fullname;
                                        });
                                    @endphp
                                    @foreach ($filteredAbsensis->all() as $absensi)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $absensi->nama }}</td>
                                            <td>{{ $absensi->tanggal }}</td>
                                            <td>{{ $absensi->kehadiran }}</td>
                                            <td>{{ $absensi->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="col-12">
                        <div class="alert alert-primary">
                            Data absensi tidak ada.
                        </div>
                    </div>
                @endif
            </x-form-card>
        </div>
    </div>

    <!-- Modal Absen-->
    <x-modal-absensi></x-modal-absensi>
</x-app-layout>
