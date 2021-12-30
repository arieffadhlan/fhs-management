<x-app-layout title="Laporan Transaksi Barang">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    @endpush
    <x-alert-success></x-alert-success>

    <div class="d-flex justify-content-between align-items-center">
        <h2>Laporan Transaksi Barang</h2>
    </div>
    <div class="col-12">
        <x-form-card>
            <x-slot name="title">
                <div class="d-flex justify-content-between align-items-center">
                    Data Laporan Transaksi Barang
                </div>
            </x-slot>

            @if ($transactions->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="tableTransaksiBarang">
                        <thead class="text-center">
                            <tr class="table-secondary">
                                <th>Tanggal</th>
                                <th>Customer</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="text-center">
                                    <td>
                                        @foreach ($customers as $customer)
                                            @if ($transaction->nama_pelanggan == $customer->nama_customer)
                                                <ol class="p-0">{{ $transaction->tanggal_keluar }}</ol>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $transaction->nama_pelanggan }}</td>
                                    <td>
                                        @foreach ($customers as $customer)
                                            @if ($transaction->nama_pelanggan == $customer->nama_customer)
                                                <ol class="p-0">{{ $transaction->nama_barang }}</ol>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($customers as $customer)
                                            @if ($transaction->nama_pelanggan == $customer->nama_customer)
                                                <ol class="p-0">{{ $transaction->jumlah_transaksi }}</ol>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($customers as $customer)
                                            @if ($transaction->nama_pelanggan == $customer->nama_customer)
                                                @if ($transaction->status_barang == 'masuk')
                                                    <ol class="badge bg-primary">
                                                        {{ $transaction->status_barang }}
                                                    </ol>
                                                @else
                                                    <ol class="badge bg-danger">
                                                        {{ $transaction->status_barang }}
                                                    </ol>
                                                @endif
                                            @endif
                                        @endforeach
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
