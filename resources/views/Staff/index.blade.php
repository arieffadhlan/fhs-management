<x-app-layout title="Staff">
    <x-alert-success></x-alert-success>
    <h2>Staff</h2>

    <x-form-card>
        <x-slot name="title">
            <div class="d-flex justify-content-between align-items-center">
                Data Staff
                <a class="btn btn-primary" href="{{ route('DataStaff.create') }}" role="button">
                    <i class="fas fa-fw fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </x-slot>

        @if ($staffs->isNotEmpty())
            <section class="section">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped table-bordered" id="tableStaff">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr class="text-center">
                                        <td style="width: 10%;">{{ $no++ }}</td>
                                        <td>{{ $staff->nama_staff }}</td>
                                        <td>{{ $staff->alamat_staff }}</td>
                                        <td>{{ $staff->email_staff }}</td>
                                        <td>{{ $staff->telp_staff }}</td>
                                        <td>
                                            <a class="badge bg-success border-0 text-white fw-normal" href="{{ route('DataStaff.edit', $staff->id) }}" role="button">
                                                <i class="fa fa-edit"></i>
                                                Ubah
                                            </a>
                                            <button type="button" class="badge bg-danger border-0 fw-normal" style="font-size: 14px;" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $staff->id }}">
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </button>
                                            <x-modal-delete-staff>
                                                <x-slot name="staff_id">
                                                    {{ $staff->id }}
                                                </x-slot>
                                                <x-slot name="staff_name">
                                                    {{ $staff->nama_staff }}
                                                </x-slot>
                                            </x-modal-delete-staff>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @else
            <div class="col-12">
                <div class="alert alert-primary">
                    Data staff tidak ditemukan.
                </div>
            </div>
        @endif
    </x-form-card>
</x-app-layout>
