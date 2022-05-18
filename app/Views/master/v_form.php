<form id="form-crud">
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label for="name">Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="col-4">
                <label for="village">Desa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="village" name="village">
            </div>
            <div class="col-1">
                <label for="rt">RT <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="rt" name="rt">
            </div>
            <div class="col-1">
                <label for="rw">RW <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="rw" name="rw">
            </div>
            <div class="col-2">
                <label for="tgl_in">Tgl. Kedatangan <span class="text-danger">*</span></label>
                <input class="form-control" name="tgl_in" id="tgl_in" type="date">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4">
                <label for="amount">Nominal <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="amount" name="amount">
            </div>
            <div class="col-6">
                <label for="address">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" style="height: 150px;" name="address" id="address"></textarea>
            </div>
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss="modal">Batal</button>
        <button type='submit' class='btn btn-primary'>Simpan</button>
    </div>
</form>

<script>
    // Disabled Past Date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#tgl_in').attr('min', today);

    $(document).ready(function() {
        $('#form-crud').on('submit', function(ev) {
            ev.preventDefault();

            var type = "<?= $form_type ?>";
            var link = "<?= base_url('visitor/add') ?>";
            var dt = $(this).serialize();
            var pros = 'tambah';
            if (type == 'edit') {
                link = "<?= base_url('visitor/edit') ?>";
                pros = 'edit'
            }

            $.ajax({
                type: 'post',
                url: link,
                data: dt,
                dataType: 'json',
                success: function(res) {
                    if (res.success == 1) {
                        $.notify('Data berhasil di' + pros, 'success');
                        setTimeout(() => {
                            $('#crud-modal').modal('toggle');
                            table.ajax.reload();
                        }, 150);
                    } else {
                        $.notify('Proses data Gagal!', 'error');
                        setTimeout(() => {
                            $('#crud-modal').modal('toggle');
                        }, 150);
                    }
                }
            })
        })
    })
</script>