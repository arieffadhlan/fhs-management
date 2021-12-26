<x-app-layout title="Pengguna">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Pengguna</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Pengguna
                    <a class="btn btn-primary" href="{{ route('pengguna.create') }}" role="button">
                        <i class="fas fa-fw fa-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </x-slot>
            @if ($users->isNotEmpty())
                <section class="section table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableDataMasterAkun">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hak Akses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>
                                        @if ($user->role == 'admin')
                                            <span class="badge bg-dark">{{ ucwords($user->role) }}</span>
                                        @else
                                            <span class="badge bg-primary">Staff</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status == 'Aktif')
                                            <span class="badge bg-primary">{{ $user->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $user->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="badge bg-success border-0 text-white"
                                            href="{{ route('pengguna.edit', $user->id) }}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $user->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <x-modal-delete>
                                            <x-slot name="id">{{ $user->id }}</x-slot>
                                            <x-slot name="delete_label">Data Pengguna</x-slot>
                                            <x-slot name="delete_action">
                                                {{ route('pengguna.delete', $user->id) }}
                                            </x-slot>
                                        </x-modal-delete>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data pengguna tidak ada.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>

    @push('scripts')
        <script>
            let tableDataMasterAkun = document.querySelector('#tableDataMasterAkun');
            let dataTableDataMasterAkun = new simpleDatatables.DataTable(tableDataMasterAkun);
        </script>
    @endpush
</x-app-layout>
