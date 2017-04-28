<div class="modal fade" id="category-delete-confifm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus kategori ini? {{ slugDesc }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="at.deleteCategory(at.getId)">OK</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
