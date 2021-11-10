<x-app-layout title="Stock">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @php
                session()->forget('success');
            @endphp
        </div>
    @endif

    <div class="stock-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h2 class="m-0">Data penjualan Barang</h2>
        <a class="btn btn-primary" href="{{ route('penjualanBarang') }}" role="button">Tambah Stock</a>
    </div>
    
</x-app-layout>
