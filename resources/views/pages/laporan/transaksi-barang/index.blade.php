<x-app-layout title="Transaksi Barang">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Transaksi Barang</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Transaksi Barang
                </div>
            </x-slot>
            @if ($transactions->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableTransaksiBarang">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="text-center">
                                    <td>{{ date('d M Y H:i', strtotime($transaction->tanggal_masuk)) }}</td>
                                    <td class="text-wrap">{{ $transaction->nama_barang }}</td>
                                    <td>{{ $transaction->kategori_barang }}</td>
                                    <td>{{ $transaction->jumlah_transaksi }}</td>
                                    <td>
                                        @if ($transaction->status_barang == 'masuk')
                                            <span class="badge bg-primary">
                                                {{ ucwords($transaction->status_barang) }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                {{ ucwords($transaction->status_barang) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="badge bg-success border-0 text-white fw-normal"
                                            href="{{ route('transaksi-barang.edit', $transaction->id) }}"
                                            role="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
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
            let tableTransaksiBarang = document.querySelector('#tableTransaksiBarang');
            let dataTableTransaksiBarang = new simpleDatatables.DataTable(tableTransaksiBarang);
        </script>
    @endpush
</x-app-layout>
