<x-app-layout title="Customer">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>
    
    <div class="d-flex justify-content-between align-items-center">
        <h2>Customer</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Customer
                    @if (Auth::user()->role == 'admin')
                        <a class="btn btn-primary" href="{{ route('customer.create') }}" role="button">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah Data
                        </a>
                    @endif
                </div>
            </x-slot>
            @if ($customers->isNotEmpty())
                <div class="tabel-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableCustomer">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Daerah</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        @php $no = 1; @endphp
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="text-center">
                                    <td style="width: 10%;">{{ $no++ }}</td>
                                    <td>{{ $customer->nama_customer }}</td>
                                    <td>{{ $customer->kategori_daerah }}</td>
                                    <td>{{ $customer->alamat_customer }}</td>
                                    <td>{{ $customer->telp_customer }}</td>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            <a class="badge bg-success border-0 text-white fw-normal" href="{{ route('customer.edit', $customer->id) }}" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="badge bg-danger border-0 fw-normal" style="font-size: 14px;" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $customer->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <x-modal-delete>
                                                <x-slot name="id">{{ $customer->id }}</x-slot>
                                                <x-slot name="delete_label">Data Customer</x-slot>
                                                <x-slot name="delete_action">
                                                    {{ route('customer.delete', $customer->id) }}
                                                </x-slot>
                                            </x-modal-delete>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data customer kosong.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>
    @if ($customers->isNotEmpty())
        @push('scripts')
            <script>
                let tableCustomer = document.querySelector('#tableCustomer');
                let dataTableCustomer = new simpleDatatables.DataTable(tableCustomer);
            </script>
        @endpush
    @endif
</x-app-layout>
