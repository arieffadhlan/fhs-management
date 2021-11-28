<x-app-layout title="Penjualan">
    <x-alert-success></x-alert-success>
    <x-alert-error></x-alert-error>

    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Penjualan</h2>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#barang" role="tab" aria-controls="home"
                aria-selected="true">Penjualan Barang</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#customer" role="tab"
                aria-controls="profile" aria-selected="false">Pembelian Customer</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#staff" role="tab"
                aria-controls="profile" aria-selected="false">Penjualan Staff</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="barang" role="tabpanel" aria-labelledby="home-tab">
            <br>
            <x-form-card>
                <x-slot name="title">
                    <div class="d-flex justify-content-between align-items-center">
                        Data Penjualan Barang
                        <a class="btn btn-primary" href="{{ route('penjualanBarang.create') }}" role="button">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </x-slot>

                {{-- Penjualan Barang --}}
                @if ($penjualans->isNotEmpty())
                    <section class="sectionPenjualanBarang">
                        <table class="table table-hover table-striped table-bordered" id="tablePenjualanBarang">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang keluar</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($penjualans as $penjualan)
                                    <tr class="text-center">
                                        <td>{{ $penjualan->nama_barang }}</td>
                                        <td>{{ $penjualan->jumlah_barang }} dus</td>
                                        <td>{{ date('d-m-Y', strtotime($penjualan->tanggal_keluar)) }}</td>
                                        <td>
                                            <a class="badge bg-success border-0 text-white fw-normal"
                                                href="{{ route('penjualanBarang.edit', $penjualan->id) }}"
                                                role="button">
                                                <i class="fa fa-edit"></i>
                                                Ubah
                                            </a>
                                            <button type="button" class="badge bg-danger border-0 fw-normal"
                                                style="font-size: 14px;" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $penjualan->id }}">
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </button>
                                            <x-modal-delete-penjualan-barang>
                                                <x-slot name="penjualan_barang_id">
                                                    {{ $penjualan->id }}
                                                </x-slot>
                                            </x-modal-delete-penjualan-barang>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                @else
                    <div class="col-12">
                        <div class="alert alert-primary">
                            Data penjualan barang kosong.
                        </div>
                    </div>
                @endif
            </x-form-card>
        </div>

        {{-- Pembelian Customer --}}
        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <x-form-card>
                <x-slot name="title">
                    <div class="d-flex justify-content-between align-items-center">
                        Data Pembelian Customer
                        <a class="btn btn-primary" href="{{ route('pembelianCustomer.create') }}" role="button">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </x-slot>

                @if ($customers->isNotEmpty())
                    <section class="sectionPembelianCustomer">
                        <table class="table table-hover table-striped table-bordered" id="tablePembelianCustomer">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>Customer</th>
                                    <th>Daerah</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Tanggal</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($customers as $customer)
                                    <tr class="text-center">
                                        <td>{{ $customer->nama_customer }}</td>
                                        <td>{{ $customer->kategori_daerah }}</td>
                                        <td>{{ $customer->alamat_customer }}</td>
                                        <td>{{ $customer->telp_customer }}</td>
                                        @foreach ($customer->pembelian as $pembelian)
                                            <td>{{ date('d-m-Y', strtotime($pembelian->tanggal_masuk)) }}</td>
                                            <td>{{ $pembelian->nama_barang }}</td>
                                            <td>{{ $pembelian->jumlah_pembelian }} dus</td>
                                        @endforeach
                                        <td>
                                            @foreach ($customer->pembelian as $pembelianCust)
                                                <a class="badge bg-success border-0 text-white fw-normal"
                                                    href="{{ route('pembelianCustomer.edit', $pembelianCust->id) }}"
                                                    role="button">
                                                    <i class="fa fa-edit"></i>
                                                    Ubah
                                                </a>
                                                <button type="button" class="badge bg-danger border-0 fw-normal"
                                                    style="font-size: 14px;" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeletePembelianCustomer{{ $pembelianCust->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <x-modal-delete-pembelian-customer>
                                                    <x-slot name="pembelianCustomer_id">
                                                        {{ $pembelianCust->id }}
                                                    </x-slot>
                                                </x-modal-delete-pembelian-customer>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                @else
                    <div class="col-12">
                        <div class="alert alert-primary">
                            Data pembelian customer kosong.
                        </div>
                    </div>
                @endif
            </x-form-card>
        </div>

        {{-- Penjualan Staff --}}
        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <x-form-card>
                <x-slot name="title">
                    <div class="d-flex justify-content-between align-items-center">
                        Data Penjualan Staff
                        <a class="btn btn-primary" href="{{ route('penjualanStaff.create') }}" role="button">
                            <i class="fas fa-fw fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </x-slot>

                @if ($penjualanStaff->isNotEmpty())
                    <section class="sectionPenjualanStaff">
                        <table class="table table-hover table-striped table-bordered" id="tablePenjualanStaff">
                            <thead class="text-center">
                                <tr class="table-secondary">
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    @foreach ($staff->PenjualanStaff as $penjualan)
                                        <tr class="text-center">
                                            <td>{{ $staff->nama_staff }}</td>
                                            <td>{{ date('d-m-Y', strtotime($penjualan->tanggal_penjualan)) }}</td>
                                            <td>{{ $penjualan->nama_barang }}</td>
                                            <td>{{ $penjualan->jumlah_penjualan }} dus</td>
                                            <td>
                                                <a class="badge bg-success border-0 text-white fw-normal"
                                                    href="{{ route('penjualanStaff.edit', $penjualan->id) }}"
                                                    role="button">
                                                    <i class="fa fa-edit"></i>
                                                    Ubah
                                                </a>
                                                <button type="button" class="badge bg-danger border-0 fw-normal"
                                                    style="font-size: 14px;" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeletePenjualanStaff{{ $penjualan->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <x-modal-delete-penjualan-staff>
                                                    <x-slot name="penjualanStaff_id">
                                                        {{ $penjualan->id }}
                                                    </x-slot>
                                                </x-modal-delete-penjualan-staff>
                                            </td>
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
        </div>
    </div>
</x-app-layout>
