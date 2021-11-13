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
        <h2 class="m-0">Pendataan Stock Barang</h2>
        <a class="btn btn-primary" href="{{ route('tambah') }}" role="button">Tambah Stock</a>
    </div>
    @if ($stocks->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="text-center">
                    <tr class="table-dark">
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Deksripsi</th>
                        <th>Gambar</th>
                        <th>Jumlah Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($stocks as $stock)
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $stock->nama_barang }}</td>
                            <td>{{ $stock->kategori_barang }}</td>
                            <td>{!! nl2br(Str::limit($stock->deskripsi_barang, 150)) !!}</td>
                            <td>
                                <img style="width: 150px" src="{{ asset('storage/images/' . $stock->image) }}" alt="">
                            </td>
                            <td>{{ $stock->jumlah_barang }}</td>
                            <td>
                                <button class="badge bg-success border-0">Edit</button>
                                <button class="badge bg-danger border-0">Delete</button>
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
</x-app-layout>
