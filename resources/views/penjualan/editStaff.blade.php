<x-app-layout title="Edit Penjualan Staff">
    <h2>Perubahan Data Penjualan Staff</h2>
    <form method="POST" action="{{ route('penjualanStaff.update', $penjualans->id) }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">

            <label for="staff_id" class="form-label @error('staff_id') is-invalid @enderror">Nama Staff</label>
            <select name="staff_id" value="{{ old('staff_id') }}" class="form-select" id="inputGroupSelect01">
                <option selected>Pilih Staff</option>
                    @foreach($staffs as $staff)
                        @if($penjualans->id == $staff->id)
                            <option value="{{$staff->id}}" selected>{{$staff->nama_staff}}</option>
                        @else
                            <option value="{{$staff->id}}">{{$staff->nama_staff}}</option>
                        @endif
                    @endforeach
            </select>
            @error('staff_id')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="inputAddress" class="form-label">Nama Barang</label>
            <select name="nama_barang" value="{{ old('nama_barang') }}" class="form-select" id="inputGroupSelect01">
                <option selected>Pilih barang</option>
                    @foreach($stocks as $stock)
                        @if($penjualans->nama_barang == $stock->nama_barang)
                            <option value="{{$stock->nama_barang}}" selected>{{$stock->nama_barang}}</option>
                        @else
                            <option value="{{$stock->nama_barang}}">{{$stock->nama_barang}}</option>
                        @endif
                    @endforeach
            </select>
            @error('nama_barang')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="jumlah_penjualan" class="form-label @error('jumlah_penjualan') is-invalid @enderror">Jumlah Penjualan</label>
            <input type="number" min="1" value="{{ old('jumlah_penjualan', $penjualans->jumlah_penjualan) }}" name="jumlah_penjualan" class="form-control"
                id="jumlah_penjualan" placeholder="">
            @error('jumlah_penjualan')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>

            <label for="tanggal_penjualan" class="form-label @error('tanggal_penjualan') is-invalid @enderror">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" value="{{ old('tanggal_penjualan', $penjualans->tanggal_penjualan) }}" class="form-control"
                id="tanggal_penjualan" placeholder="">
            @error('tanggal_penjualan')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <br>


        <!-- untuk preview dan hapus image -->
        <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }

            function clearImage() {
                frame.src = "";
            }
        </script>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
        </div>
    </form>
</x-app-layout>
