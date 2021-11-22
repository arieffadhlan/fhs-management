<div class="modal fade" id="edit-foto" tabindex="-1" aria-labelledby="edit-foto" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="AccountImageClose()"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mt-2 mb-2">
                        <p style="font-size: smaller;">Masukkan foto Anda.</p>
                        <input class="form-control form-control-sm" name="image" id="account-image" onchange="readURL(this);" type="file" required autocomplete="off">
                        <img src="" id="preview-account-image" class="mt-3 mb-1">
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="reset" onclick="clearAccountImage()" class="btn btn-sm btn-danger">Hapus Foto</button>
                <button type="submit" name="submit" class="btn btn-sm btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>