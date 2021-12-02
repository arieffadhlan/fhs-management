<div class="modal fade" id="modalDelete{{ $staff_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="modalDeleteLabel">
                    Hapus Data Staff {{ $staff_name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('DataStaff.delete', $staff_id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                        <i class="fas fa-exclamation-triangle fa-8x" style="color: #dc3545"></i>
                        <h5 class="text-black mt-3">Anda yakin ingin menghapusnya?</h5>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-primary fs-6" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i>
                            Tidak
                        </button>
                        <button type="submit" class="btn btn-sm btn-danger fs-6">
                            <i class="fa fa-paper-plane me-1"></i>
                            Yakin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
