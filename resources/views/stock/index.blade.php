<x-app-layout title="Stok">
    <x-alert-success></x-alert-success>
    <x-alert-error></x-alert-error>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Stok</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Stok Barang
                    <a class="btn btn-primary" href="{{ route('stock.create') }}" role="button">
                        <i class="fas fa-fw fa-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </x-slot>
            @if ($stocks->isNotEmpty())
                <section class="section">
                    <table class="table table-hover table-striped table-bordered" id="tableStok">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Deksripsi</th>
                                <th>Gambar</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr class="text-center">
                                    <td class="text-wrap">{{ $stock->nama_barang }}</td>
                                    <td>{{ $stock->kategori_barang }}</td>
                                    <td>{!! nl2br(Str::limit($stock->deskripsi_barang, 150)) !!}</td>
                                    <td>
                                        <img style="width: 100px" src="{{ asset('storage/images/' . $stock->image) }}"
                                            alt="">
                                    </td>
                                    @if ($stock->jumlah_barang == 0)
                                        <td>Stock barang kosong.</td>
                                    @else
                                        <td>{{ $stock->jumlah_barang }}</td>
                                    @endif
                                    <td>
                                        <a class="badge bg-success border-0 text-white fw-normal"
                                            href="{{ route('stock.edit', $stock->id) }}" role="button">
                                            <i class="fa fa-edit"></i>
                                            Ubah
                                        </a>
                                        <button type="button" class="badge bg-danger border-0 fw-normal"
                                            style="font-size: 14px;" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $stock->id }}">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </button>
                                        <x-modal-delete-stock>
                                            <x-slot name="stock_id">
                                                {{ $stock->id }}
                                            </x-slot>
                                        </x-modal-delete-stock>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data stok kosong.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>
</x-app-layout>
