<x-app-layout title="Kategori">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Kategori</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Kategori
                    @if (Auth::user()->role == 'admin')
                        <a class="btn btn-primary" href="{{ route('kategori.create') }}" role="button">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah Data
                        </a>
                    @endif
                </div>
            </x-slot>
            @if ($categories->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableKategori">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>No</th>
                                <th>Nama Kategori</th>
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td class="text-wrap">{{ $category->nama_kategori }}</td>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            <a class="badge bg-success border-0 text-white fw-normal"
                                                href="{{ route('kategori.edit', $category->id) }}" role="button">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="badge bg-danger border-0 fw-normal"
                                                style="font-size: 14px;" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $category->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <x-modal-delete>
                                                <x-slot name="id">{{ $category->id }}</x-slot>
                                                <x-slot name="delete_label">Data Kategori</x-slot>
                                                <x-slot name="delete_action">
                                                    {{ route('kategori.delete', $category->id) }}
                                                </x-slot>
                                            </x-modal-delete>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-primary">
                        Data kategori tidak ada.
                    </div>
                </div>
            @endif
        </x-form-card>
    </div>

    @if ($categories->isNotEmpty())
        @push('scripts')
            <script>
                let tableKategori = document.querySelector('#tableKategori');
                let dataTableKategori = new simpleDatatables.DataTable(tableKategori);
            </script>
        @endpush
    @endif
</x-app-layout>
