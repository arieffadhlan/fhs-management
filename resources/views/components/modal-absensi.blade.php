<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Isi Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route ('absensi.store')}}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Nama</span>
                        </div>
                        <input type="text" name="nama" value="{{Auth::user()->fullname}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Tanggal</span>
                        </div>
                        <input type="datetime" name="tanggal" value="{{ date('d F Y H:i:s', strtotime(NOW())) }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                    </div>
                    
                    <div class="input-group mb-3 d-flex flex-column">
                        <div class="input-group-prepend w-100 me-3 mb-2">
                            <span class="input-group-text" id="basic-addon3">Status</span>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <label class="form-check-label" for="status1">Hadir</label>
                            <input class="form-check-input" type="radio" name="kehadiran" id="status1" value="Hadir" required>
                        </div>
                        <div class="form-check form-check-inline mb-2">
                            <input class="form-check-input" type="radio" name="kehadiran" id="status2" value="Izin" required>
                            <label class="form-check-label" for="status2">Izin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kehadiran" id="status3" value="Tidak Hadir" required>
                            <label class="form-check-label" for="status3">Tidak Hadir</label>
                        </div>
                    </div>
                    
                    <div class="modal-footer p-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>