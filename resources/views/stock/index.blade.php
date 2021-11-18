<x-app-layout title="Stock">
    <x-alert-success></x-alert-success>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Stock Barang</h2>
        <a class="btn btn-primary" href="{{ route('tambah') }}" role="button">Tambah Stock</a>
    </div>
    <div class="col-12">
                    <x-form-card>
                    <x-slot name="title">
                        Data Stock Barang
                    </x-slot>
                        @if ($stocks->isNotEmpty())
                            <section class="section">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped" id="table4">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kategori</th>
                                                    <th>Deksripsi</th>
                                                    <th>Gambar</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @php $no = 1; @endphp
                                            <tbody>
                                                @foreach ($stocks as $stock)
                                                    <tr class="text-center">
                                                        <td style="width: 10%;">{{ $no++ }}</td>
                                                        <td class="text-wrap">{{ $stock->nama_barang }}</td>
                                                        <td>{{ $stock->kategori_barang }}</td>
                                                        <td>{!! nl2br(Str::limit($stock->deskripsi_barang, 150)) !!}</td>
                                                        <td>
                                                            <img style="width: 100px" src="{{ asset('storage/images/' . $stock->image) }}" alt="">
                                                        </td>
                                                        @if ($stock->jumlah_barang == 0)
                                                            <td>Stock barang kosong.</td>
                                                        @else
                                                            <td>{{ $stock->jumlah_barang }}</td>
                                                        @endif
                                                        <td>
                                                        <a class="badge bg-success border-0" href="{{ route('stock.edit', $stock->id) }}" role="button">Edit</button>
                                                        <a class="badge bg-danger border-0" href="{{ route('stock.delete', $stock->id) }}" role="button">Delete</button>
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
                </x-form-card>
            </div>
    </div>
</x-app-layout>
