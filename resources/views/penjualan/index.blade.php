<x-app-layout title="Stock">
    <x-alert-success></x-alert-success>

    <!-- <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script> -->

    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Data penjualan Barang</h2>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#barang" role="tab" aria-controls="home" aria-selected="true">Penjualan Barang</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#customer" role="tab" aria-controls="profile" aria-selected="false">Pembelian Customer</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#staff" role="tab" aria-controls="profile" aria-selected="false">Penjualan Staff</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="barang" role="tabpanel" aria-labelledby="home-tab">
            <br>
            @if ($penjualan->isNotEmpty())
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table3">
                                <thead class="text-center">
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang keluar</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($penjualan as $penjualan)
                                    <tr class="text-center">
                                        <td>{{ $penjualan->nama_barang }}</td>
                                        <td>{{ $penjualan->jumlah_barang }} dus</td>
                                        <td>{{ $penjualan->tanggal_keluar }}</td>
                                        <td>
                                            <a class="badge bg-success border-0" href="{{ route('penjualanBarang.edit', $penjualan->id) }}" role="button">Edit</a>
                                            <a class="badge bg-danger border-0" href="{{ route('penjualanBarang.delete', $penjualan->id) }}" role="button">Delete</a>
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
            <a class="btn btn-primary" href="{{ route('penjualanBarang') }}" role="button">Tambah Data Penjualan</a>
            
            
            <!-- <script>
                // Simple Datatable
                let table3 = document.querySelector('#table3');
                let dataTable = new simpleDatatables.DataTable(table3);
            </script> -->
            
        </div>

        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            @if ($customer->isNotEmpty())
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive-md">
                            <table class="table table-striped" id="table2">
                                <thead class="text-center">
                                    <tr>
                                        <th>Customer</th>
                                        <th>Daerah</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Tgl Pembelian</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($customer as $customer)
                                    <tr class="text-center">
                                        <td>{{ $customer->nama_customer }}</td>
                                        <td>{{ $customer->kategori_daerah }}</td>
                                        <td>{{ $customer->alamat_customer }}</td>
                                        <td>{{ $customer->telp_customer }}</td>
                                        <td>
                                            @foreach($customer->pembelian as $pembelian)
                                            <ol>{{ $pembelian->tanggal_masuk}}</ol>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($customer->pembelian as $pembelian)
                                            <ol>{{ $pembelian->nama_barang}}</ol>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($customer->pembelian as $pembelian)
                                            <ol>{{ $pembelian->jumlah_pembelian}} dus</ol>
                                            @endforeach
                                        </td>
                                        <td>
                                        @foreach($customer->pembelian as $pembelianCust)
                                            <ol>
                                                <a class="badge bg-success border-0" href="{{ route('customer.edit', $pembelianCust->id) }}" role="button">Edit</a>
                                                <a class="badge bg-danger border-0" href="" role="button">Delete</a>
                                            </ol>
                                        @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
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
            <a class="btn btn-primary" href="{{ route('pembelianCustomer') }}" role="button">Tambah Data Pembelian</a>
        </div>
    
        <!-- <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendors/simple-datatables2/simple-datatables.js') }}"></script>
        <script>
            // Simple Datatable
            let table2 = document.querySelector('#table2');
            let dataTable = new simpleDatatables.DataTable(table2);
        </script> -->

        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            @if ($staffs->isNotEmpty())
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead class="text-center">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($staffs as $penjualan)
                                    <tr>
                                        <td>{{ $penjualan->nama_staff }}</td>
                                        <td>
                                            @foreach($penjualan->PenjualanStaff as $pembelian)
                                                <ol>{{ $pembelian->tanggal_penjualan}}</ol>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($penjualan->PenjualanStaff as $pembelian)
                                                <ol>{{ $pembelian->nama_barang}}</ol>
                                            @endforeach
                                        </td>
                                        <td>
                                        @foreach($penjualan->PenjualanStaff as $pembelian)
                                            <ol>{{ $pembelian->jumlah_penjualan}} dus</ol>
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach($penjualan->PenjualanStaff as $pembelian)
                                        <ol>
                                            <a class="badge bg-success border-0" href="{{ route('penjualanStaff.edit', $pembelian->id) }}" role="button">Edit</a>
                                            <a class="badge bg-danger border-0" href="{{ route('penjualanStaff.delete', $pembelian->id) }}" role="button">Delete</a>
                                        </ol>
                                        @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data barang tidak ditemukan.
                    </div>
                </div>
            @endif
            <a class="btn btn-primary" href="{{ route('penjualanStaff') }}" role="button">Tambah Penjualan Staff</a>
        </div>
    </div>
    
    <!-- <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script> -->
</x-app-layout>