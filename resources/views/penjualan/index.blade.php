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
    
</x-app-layout>