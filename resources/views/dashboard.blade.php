<x-app-layout title="Dashboard">
    <x-alert-success></x-alert-success>
    <div class="container">
        <div class="row">
            <x-date-time></x-date-time>
            <div class="col-12">
                <x-form-card>
                    <x-slot name="title">
                        <div class="d-flex justify-content-between align-items-center">
                            Data Stok Barang
                        </div>
                    </x-slot>
                    @if ($stocks->isNotEmpty())
                        <section class="section">
                            <table class="table table-hover table-striped table-bordered" id="tableStok">
                                <thead class="text-center">
                                    <tr class="table-secondary">
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr class="text-center">
                                            <td class="text-wrap">{{ $stock->nama_barang }}</td>
                                            <td>
                                                <img style="width: 100px"
                                                    src="{{ asset('storage/images/' . $stock->image) }}" alt="">
                                            </td>
                                            @if ($stock->jumlah_barang == 0)
                                                <td>Stock barang kosong.</td>
                                            @else
                                                <td>{{ $stock->jumlah_barang }}</td>
                                            @endif
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
        </div>
    </div>
</x-app-layout>
