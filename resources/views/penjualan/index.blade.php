<x-app-layout title="Stock">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @php
                session()->forget('success');
            @endphp
        </div>
    @endif

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
                    Data barang tidak ditemukan.
                </div>
            </div>
        </div>
    </div>

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
    
</x-app-layout>
