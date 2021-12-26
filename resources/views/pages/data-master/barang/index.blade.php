<x-app-layout title="Barang">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Barang</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Barang
                    <a class="btn btn-primary" href="{{ route('barang.create') }}" role="button">
                        <i class="fas fa-fw fa-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </x-slot>
            @if ($barangs->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableBarang">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr class="text-center">
                                    <td>
                                        <img style="width: 50px"
                                            src="{{ asset('storage/images/' . $barang->foto_barang) }}"
                                            alt="{{ $barang->foto_barang }}" class="imgPreview">
                                        <x-modal-zoom-image></x-modal-zoom-image>
                                    </td>
                                    <td class="text-wrap">{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->kategori_barang }}</td>
                                    @if ($barang->stok_barang == 0)
                                        <td>Stok kosong</td>
                                    @else
                                        <td>{{ $barang->stok_barang }} dus</td>
                                    @endif
                                    <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                                    <td>
                                        <a class="badge bg-success border-0 text-white fw-normal"
                                            href="{{ route('barang.edit', $barang->id) }}" role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="badge bg-danger border-0 fw-normal"
                                            style="font-size: 14px;" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $barang->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <x-modal-delete>
                                            <x-slot name="id">{{ $barang->id }}</x-slot>
                                            <x-slot name="delete_label">Data Barang</x-slot>
                                            <x-slot name="delete_action">
                                                {{ route('pengguna.delete', $barang->id) }}
                                            </x-slot>
                                        </x-modal-delete>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data barang tidak ada.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>

    @push('scripts')
        <script>
            let tableBarang = document.querySelector('#tableBarang');
            let dataTableBarang = new simpleDatatables.DataTable(tableBarang);
        </script>
    @endpush
</x-app-layout>
