<x-app-layout title="Edit Kategori">
    <h2>Ubah Data kategori</h2>
    <x-form-card>
        <x-slot name="title">
            Form Data kategori
        </x-slot>

        <form method="POST" action="{{ route('kategori.update', $category['0']->id) }}">
            @method('put')
            @csrf
            <x-form-container>
                <x-label>
                    <x-slot name="label_for">nama_kategori</x-slot>
                    Nama Kategori
                </x-label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                    value="{{ old('nama_kategori', $category['0']->nama_kategori) }}">
                @error('nama_kategori')
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
