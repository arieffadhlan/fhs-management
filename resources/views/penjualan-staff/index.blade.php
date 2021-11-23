<x-app-layout title="Data Penjualan Staff">
    <h2>Data Penjualan Staff</h2>
    <x-form-card>
        <x-slot name="title">
            Data Penjualan Staff
        </x-slot>

        @php 
            $no = 1;
            $filteredStaffs = $staffs->filter(function ($value, $key) {
                return $value->nama_staff == Auth::user()->fullname;
            });
        @endphp
        @if (!empty($filteredStaffs->all()))
        <section class="sectionPenjualanStaff">
            <table class="table table-hover table-striped table-bordered" id="tablePenjualanStaff">
                <thead class="text-center">
                    <tr class="table-secondary">
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filteredStaffs as $staff)
                        @foreach($staff->PenjualanStaff as $pembelian)
                            <tr class="text-center">
                                <td>{{ $staff->nama_staff }}</td>
                                <td>{{ date("d-m-Y", strtotime($pembelian->tanggal_penjualan)) }}</td>
                                <td>{{ $pembelian->nama_barang }}</td>
                                <td>{{ $pembelian->jumlah_penjualan}} dus</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </section>
        @else
            <div class="col-12">
                <div class="alert alert-primary">
                    Data penjualan staff kosong.
                </div>
            </div>
        @endif
    </x-form-card>
</x-app-layout>