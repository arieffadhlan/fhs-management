<x-app-layout title="Stock">
    <x-alert-success></x-alert-success>

    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Data penjualan Barang</h2>
    </div>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBarang" aria-expanded="false" aria-controls="collapseExample">
        Tampilakan Data
    </button>
    <a class="btn btn-primary" href="{{ route('penjualanBarang') }}" role="button">Tambah Data Penjualan</a>
    <br><br>

    <div class="collapse" id="collapseBarang">
        <div class="card card-body">
            <div class="col-12">
                <!-- nanti di isi ya beb  -->
                <div class="alert alert-primary">
                @if ($penjualan->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="text-center">
                        <tr class="table-dark">
                            <th>Nama Barang</th>
                            <th>Jumlah Barang keluar</th>
                            <th>Tanggal Keluar</th>
                        </tr>
                    </thead>
                    @foreach ($penjualan as $penjualan)
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $penjualan->nama_barang }}</td>
                                <td>{{ $penjualan->jumlah_barang }} dus</td>
                                <td>{{ $penjualan->tanggal_keluar }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data barang tidak ditemukan.
                    </div>
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Yeftha -->
    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Data Pembelian Customer</h2>
    </div>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCustomer" aria-expanded="false" aria-controls="collapseExample">
        Tampilakan Data
    </button>
    <a class="btn btn-primary" href="{{ route('pembelianCustomer') }}" role="button">Tambah Pembelian</a>
    <br><br>

    <div class="collapse" id="collapseCustomer">
        <div class="card card-body">
            @if ($customer->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="text-center">
                        <tr class="table-dark">
                            <th>Customer</th>
                            <th>Daerah</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama Barang</th>
                            <th>Jlh Pembelian</th>
                        </tr>
                    </thead>
                    @foreach ($customer as $customer)
                        <tbody>
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
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data barang tidak ditemukan.
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Monica -->
    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Data penjualan staff</h2>
    </div>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStaff" aria-expanded="false" aria-controls="collapseExample">
        Tampilkan Data
    </button>
    <a class="btn btn-primary" href="{{ route('penjualanStaff') }}" role="button">Tambah Penjualan Staff</a>
    <br><br>

    <div class="collapse" id="collapseStaff">
        <div class="card card-body">
            <div class="col-12">
                <!-- nanti di isi ya beb  -->
                <div class="alert alert-primary">
                @if ($penjualanStaff->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="text-center">
                        <tr class="table-dark">
                            <th>Nama Staff</th>
                            <th>Barang</th>
                            <th>Jumlah Penjualan</th>
                            <th>Tanggal Penjualan</th>
                        </tr>
                    </thead>
                    @foreach ($penjualanStaff as $penjualan)
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $penjualan->nama_staff }}</td>
                                <td>{{ $penjualan->nama_barang }} dus</td>
                                <td>{{ $penjualan->jumlah_penjualan }}</td>
                                <td>{{ $penjualan->tanggal_penjualan }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data barang tidak ditemukan.
                    </div>
                </div>
            @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>