<x-app-layout title="Edit Pemasok">
    <h2>Ubah Data Pemasok</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data Pemasok
        </x-slot>

        <form method="POST" action="{{ route('supplier.update', $supplier['0']->id) }}">
            @method('put')
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">nama_pemasok</x-slot>
                    Nama Pemasok
                </x-label>
                <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control"
                    value="{{ old('nama_pemasok', $supplier['0']->nama_pemasok) }}">
                @error('nama_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">alamat_pemasok</x-slot>
                    Alamat Pemasok
                </x-label>
                <input type="text" name="alamat_pemasok" id="alamat_pemasok" class="form-control"
                    value="{{ old('alamat_pemasok', $supplier['0']->alamat_pemasok) }}">
                @error('alamat_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <x-label>
                    <x-slot name="label_for">telepon_pemasok</x-slot>
                    Nomor Telepon
                </x-label>
                <input type="tel" name="telepon_pemasok" id="telepon_pemasok" class="form-control"
                    value="{{ old('telepon_pemasok', $supplier['0']->telepon_pemasok) }}">
                @error('telepon_pemasok')
                    <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>

                <div class="mt-2">
                    <x-button-submit></x-button-submit>
                </div>
            </x-form-container>
        </form>
    </x-form-card>
</x-app-layout>
