<x-app-layout title="Customer">
    <x-alert-success></x-alert-success>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Customer</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Customer
                    <a class="btn btn-primary" href="{{ route('dataCustomer.create') }}" role="button">
                        <i class="fas fa-fw fa-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </x-slot>
            @if ($customers->isNotEmpty())
                <table class="table table-hover table-striped table-bordered" id="tableCustomer">
                    <thead class="text-center">
                        <tr class="table-secondary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Daerah</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
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
                                <td>
                                    <a class="badge bg-success border-0 text-white fw-normal" href="{{ route('dataCustomer.edit', $customer->id) }}" role="button">
                                        <i class="fa fa-edit"></i>
                                        Ubah
                                    </a>
                                    <a class="badge bg-danger border-0 text-white fw-normal" href="{{ route('DataStaff.delete', $customer->id) }}" role="button">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data customer kosong.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>
</x-app-layout>
