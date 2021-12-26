<x-app-layout title="Pemasok">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Pemasok</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Pemasok
                    <a class="btn btn-primary" href="{{ route('supplier.create') }}" role="button">
                        <i class="fas fa-fw fa-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </x-slot>
            @if ($suppliers->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableSupplier">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($suppliers as $supplier)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td class="text-wrap">{{ $supplier->nama_pemasok }}</td>
                                    <td class="text-wrap">
                                        {!! nl2br(Str::limit($supplier->alamat_pemasok, 150)) !!}
                                    </td>
                                    <td class="text-wrap">{{ $supplier->telepon_pemasok }}</td>
                                    <td>
                                        <a class="badge bg-success border-0 text-white fw-normal"
                                            href="{{ route('supplier.edit', $supplier->id) }}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="badge bg-danger border-0 fw-normal"
                                            style="font-size: 14px;" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $supplier->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <x-modal-delete>
                                            <x-slot name="id">{{ $supplier->id }}</x-slot>
                                            <x-slot name="delete_label">Data Supplier</x-slot>
                                            <x-slot name="delete_action">
                                                {{ route('pengguna.delete', $supplier->id) }}
                                            </x-slot>
                                        </x-modal-delete>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data supplier tidak ada.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>

    @push('scripts')
        <script>
            let tableSupplier = document.querySelector('#tableSupplier');
            let dataTableSupplier = new simpleDatatables.DataTable(tableSupplier);
        </script>
    @endpush
</x-app-layout>
