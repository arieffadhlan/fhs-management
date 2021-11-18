<x-app-layout title="Customer">
    <x-alert-success></x-alert-success>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Customer</h2>
        <a class="btn btn-primary" href="{{ route('pembelianCustomer') }}" role="button">Tambah Customer</a>
    </div>
    <div class="col-12">
                <x-form-card>
                    <x-slot name="title">
                        Data Customer
                    </x-slot>
                        @if ($customers->isNotEmpty())
                            <section class="section">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped" id="table5">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>daerah</th>
                                                    <th>Alamat</th>
                                                    <th>No Telp</th>
                                                    <th>Action</th>
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
                                                            <a class="badge bg-success border-0" href="{{ route('dataCustomer.edit', $customer->id) }}" role="button">Edit</a>
                                                            <a class="badge bg-danger border-0" href="{{ route('DataStaff.delete', $customer->id) }}" role="button">Delete</a>
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
                                    Data barang tidak ditemukan.
                                </div>
                            </div>
                        @endif
                    </>
                </x-form-card>
    </div>
</x-app-layout>
