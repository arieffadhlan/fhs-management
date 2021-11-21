<x-app-layout title="Ubah Data Penjualan Staff">
    <h2>Perubahan Data Penjualan Staff</h2>

    <x-form-card>
        <x-slot name="title">
            Form
        </x-slot>
        
        <form method="POST" action="{{ route('penjualanStaff.update', $penjualan->id) }}" enctype="multipart/form-data" class="row g-3">
            @method('put')
            @csrf
            <div class="col-md-9">
                <div class="container-fluid">
                    <label for="staff_id" class="form-label fw-bold">Nama Staff<sup style="color: red">*</sup></label>
                    <select name="staff_id" class="form-select form-select-sm" aria-label=".form-select-sm">
                        @foreach($staffs as $staff)
                            @if($penjualan->id == $staff->id)
                                <option value="{{$staff->id}}" selected>{{$staff->nama_staff}}</option>
                            @else
                                <option value="{{$staff->id}}">{{$staff->nama_staff}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('staff_id')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
    
                    <label for="inputAddress" class="form-label fw-bold mt-2">
                        Nama Barang<sup style="color: red">*</sup>
                    </label>
                    <select name="nama_barang" class="form-select" id="inputGroupSelect01">
                        @foreach($stocks as $stock)
                            @if($penjualan->nama_barang == $stock->nama_barang)
                                <option value="{{$stock->nama_barang}}" selected>{{$stock->nama_barang}}</option>
                            @else
                                <option value="{{$stock->nama_barang}}">{{$stock->nama_barang}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nama_barang')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
    
                    <label for="jumlah_penjualan" class="form-label fw-bold mt-2">
                        Jumlah Penjualan<sup style="color: red">*</sup>
                    </label>
                    <input type="number" min="1" value="{{ old('jumlah_penjualan', $penjualan->jumlah_penjualan) }}" name="jumlah_penjualan" class="form-control" id="jumlah_penjualan">
                    @error('jumlah_penjualan')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
    
                    <label for="tanggal_penjualan" class="form-label fw-bold mt-2">
                        Tanggal Penjualan<sup style="color: red">*</sup>
                    </label>
                    <input type="date" name="tanggal_penjualan" value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" class="form-control" id="tanggal_penjualan">
                    @error('tanggal_penjualan')
                        <div class="fw-bold text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <br>
    
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </div>
        </form>
    </x-form-card>
</x-app-layout>
