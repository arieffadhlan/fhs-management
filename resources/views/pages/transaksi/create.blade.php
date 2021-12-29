<x-app-layout title="Tambah Transaksi">
    <x-alert-error></x-alert-error>
    <h2>Transaksi Barang</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Transaksi
        </x-slot>

        <form method="POST" action="{{ route('transaksi.store') }}">
            @csrf
            <x-form-container>
                <h5 class="fw-bold mb-0">Data Barang</h5>
                <hr class="col-2 mt-2 mb-3">
                <x-label>
                    <x-slot name="label_for">nama_barang</x-slot>
                    Nama Barang
                </x-label>
                <select name="nama_barang" id="nama_barang" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    <option selected disabled>Pilih Barang</option>
                    @if ($barangs->isNotEmpty())
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}"
                                {{ old('nama_barang') == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }} ({{ $barang->stok_barang }} dus)
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('nama_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">status_barang</x-slot>
                    Jenis Transaksi
                </x-label>
                <select name="status_barang" id="status_barang" class="form-select form-select-sm"
                    aria-label=".form-select-sm">
                    <option selected disabled>Pilih Kategori</option>
                    @if (Auth::user()->role == 'admin')
                        <option value="masuk" {{ old('status_barang') == 'masuk' ? 'selected' : '' }}>
                            Barang Masuk
                        </option>
                    @endif
                    <option value="keluar" {{ old('status_barang') == 'keluar' ? 'selected' : '' }}>
                        Barang Keluar
                    </option>
                </select>
                @error('status_barang')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">jumlah_transaksi</x-slot>
                    Jumlah Transaksi
                </x-label>
                <input type="number" name="jumlah_transaksi" id="jumlah_transaksi" class="form-control"
                    value="{{ old('jumlah_transaksi') }}" min="1">
                @error('jumlah_transaksi')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                @if (Auth::user()->role == 'admin')
                    <h5 class="fw-bold mt-3 mb-0">Data Pemasok</h5>
                    <hr class="col-2 mt-2 mb-3">

                    <label class="fw-bold mb-1">Apakah data customer sudah ada?</label>
                    <br>
                    <input type="radio" onclick="yesnoCheck();" name="yesno" id="yesCheck">
                    <label for="yesCheck" class="me-3">Sudah</label>
                    <input type="radio" onclick="yesnoCheck();" name="yesno" id="noCheck">
                    <label for="noCheck">Belum</label>
                    <br>
                    
                    <div id="ifYes" style="display: none;">
                        <label for="nama_pemasok" class="form-label fw-bold mt-4">
                            Nama Pemasok<sup style="color: red">*</sup>
                        </label>
                        <select name="nama_pemasok" id="nama_pemasok" class="form-select form-select-sm"
                            aria-label=".form-select-sm">
                            <option selected disabled>Pilih pemasok</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->nama_pemasok }}"
                                    {{ old('nama_pemasok') == $supplier->nama_pemasok ? 'selected' : '' }}>
                                    {{ $supplier->nama_pemasok }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_pemasok')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                    
                    <div id="ifNo" style="display: none;" class="mt-4">
                        <x-label>
                            <x-slot name="label_for">nama_pemasok2</x-slot>
                            Nama Pemasok
                        </x-label>
                        <input type="text" name="nama_pemasok2" id="nama_pemasok2" class="form-control"
                            value="{{ old('nama_pemasok2') }}">
                        @error('nama_pemasok2')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>

                        <x-label>
                            <x-slot name="label_for">alamat_pemasok</x-slot>
                            Alamat Pemasok
                        </x-label>
                        <input type="text" name="alamat_pemasok" id="alamat_pemasok" class="form-control"
                            value="{{ old('alamat_pemasok') }}">
                        @error('alamat_pemasok')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>

                        <x-label>
                            <x-slot name="label_for">telepon_pemasok</x-slot>
                            Nomor Telepon
                        </x-label>
                        <input type="tel" name="telepon_pemasok" id="telepon_pemasok" class="form-control"
                            value="{{ old('telepon_pemasok') }}">
                        @error('telepon_pemasok')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                @else
                    <h5 class="fw-bold mt-3 mb-0">Data Customer</h5>
                    <hr class="col-2 mt-2 mb-3">

                    <label class="fw-bold mb-1">Apakah data customer sudah ada?</label>
                    <br>
                    <input type="radio" onclick="yesnoCheck();" name="yesno" id="yesCheck">
                    <label for="yesCheck" class="me-3">Sudah</label>
                    <input type="radio" onclick="yesnoCheck();" name="yesno" id="noCheck">
                    <label for="noCheck">Belum</label>
                    <br>

                    <div id="ifYes" style="display: none;">
                        <label for="nama_customer" class="form-label fw-bold mt-4">
                            Nama Customer<sup style="color: red">*</sup>
                        </label>
                        <select name="nama_customer" id="nama_customer" class="form-select form-select-sm"
                            aria-label=".form-select-sm">
                            <option selected disabled>Pilih customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->nama_customer }}"
                                    {{ old('nama_customer') == $customer->nama_customer ? 'selected' : '' }}>
                                    {{ $customer->nama_customer }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_customer')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>

                    <div id="ifNo" style="display: none;">
                        <label for="nama_customer2" class="form-label fw-bold mt-4">
                            Nama Customer<sup style="color: red">*</sup>
                        </label>
                        <input type="text" name="nama_customer2" value="{{ old('nama_customer2') }}"
                            class="form-control" id="nama_customer2">
                        @error('nama_customer2')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="inputAddress" class="form-label fw-bold mt-2">
                            Daerah<sup style="color: red">*</sup>
                        </label>
                        <select name="kategori_daerah" value="{{ old('kategori_daerah') }}"
                            class="form-select form-select-sm" aria-label=".form-select-sm">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="Gunung" {{ old('kategori_daerah') == 'Gunung' ? 'selected' : '' }}>Gunung
                            </option>
                            <option value="Medan" {{ old('kategori_daerah') == 'Medan' ? 'selected' : '' }}>Medan
                            </option>
                            <option value="Lainnya" {{ old('kategori_daerah') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya
                            </option>
                        </select>
                        @error('kategori_daerah')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="alamat_customer" class="form-label fw-bold mt-2">
                            Alamat Customer<sup style="color: red">*</sup>
                        </label>
                        <input type="text" name="alamat_customer" value="{{ old('alamat_customer') }}"
                            class="form-control" id="alamat_customer">
                        @error('alamat_customer')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="typePhone" class="form-label fw-bold mt-2">
                            No HP Costumer<sup style="color: red">*</sup>
                        </label>
                        <input type="tel" name="telp_customer" value="{{ old('telp_customer') }}" id="typePhone"
                            class="form-control" />
                        @error('telp_customer')
                            <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>
                @endif

                <div class="mt-4">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>

            <script type="text/javascript">
                function yesnoCheck() {
                    if (document.getElementById('yesCheck').checked) {
                        document.getElementById('ifYes').style.display = 'block';
                        document.getElementById('ifNo').style.display = 'none';
                    } else {
                        document.getElementById('ifYes').style.display = 'none';
                        document.getElementById('ifNo').style.display = 'block';
                    }
                }
            </script>
        </form>
    </x-form-card>
</x-app-layout>
