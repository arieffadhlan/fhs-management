<x-app-layout title="Stock">
    <x-alert-success></x-alert-success>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Staff</h2>
        <a class="btn btn-primary" href="{{ route('DataStaff.create') }}" role="button">Tambah Staff</a>
    </div>
    <div class="col-12">
                <x-form-card>
                    <x-slot name="title">
                        Data Staff
                    </x-slot>
                        @if ($staffs->isNotEmpty())
                            <section class="section">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped" id="table5">
                                            <thead class="text-center">
                                                <tr>
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
                                                            <a class="badge bg-success border-0" href="{{ route('DataStaff.edit', $staff->id) }}" role="button">Edit</button>
                                                            <a class="badge bg-danger border-0" href="{{ route('DataStaff.delete', $staff->id) }}" role="button">Delete</button>
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

    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table = document.querySelector('#table');
        let dataTable = new simpleDatatables.DataTable(table);
    </script>

</x-app-layout>
