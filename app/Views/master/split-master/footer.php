<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Unknown Person</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>

<div class="modal fade" id="crud-modal">
    <div class="modal-dialog modal-lg" role="document" id="modal-size">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-crud" id="bodycrud">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldelete">
    <div class="modal-dialog" role="document" id="modal-size-delete">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-delete"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data ini ?
                <div id="delete-id">

                </div>
            </div>
            <div class="modal-footer">
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                <button type='button' id='btn-delete' class='btn btn-primary'>Hapus</button>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('public/assets/js/stisla.js'); ?>"></script>
<script src="<?= base_url('public/assets/js/scripts.js'); ?>"></script>
<script src="<?= base_url('public/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('public/assets/js/notify.js'); ?>"></script>
<script>
    function modalTambah(title, size, link, dt = '') {
        $.ajax({
            url: link,
            type: 'post',
            data: dt,
            dataType: 'json',
            success: function(res) {
                $('#modal-size').removeClass('modal-lg', 'modal-sm', 'modal-xl');
                $('#modal-size').addClass(size);
                $('#bodycrud').html(res.view);
                $('#crud-modal').modal('show');
                $('#modal_title').text(title);
            }
        })
    }

    function modalDelete(title, id, link) {
        $('#modaldelete').modal('show');
        $('#modal-title-delete').text(title);
        $('#delete-id').append("<input type='hidden' id='id-delete' value='" + id + "'>");
        $('#delete-id').append("<input type='hidden' id='id-link' value='" + link + "'>");
    }

    $(document).ready(function() {

        $('#crud-modal').on("hidden.bs.modal", function() {
            $('.modal-crud').html("");
            $('#modal-size').removeClass('modal-lg', 'modal-sm', 'modal-xl');
        });

        $('#modaldelete').on('hidden.bs.modal', function() {
            $('#delete-id').html("");
        });

        $('#btn-delete').on('click', function() {
            var id = $('#id-delete').val();
            var link = $('#id-link').val();

            var dt = {
                id: id,
            };

            $.ajax({
                url: '<?= base_url('visitor/delete') ?>',
                type: 'post',
                data: dt,
                success: function(res) {
                    if (res == 1) {
                        $.notify('Data berhasil dihapus', 'success');
                        setTimeout(() => {
                            table.ajax.reload();
                            $('#modaldelete').modal('toggle');
                        }, 200);
                    } else {
                        $.notify('Gagal hapus data!', 'error');
                        setTimeout(() => {
                            $('#modaldelete').modal('toggle');
                        }, 200);
                    }
                }
            })
        })
    });

    // DataTable
    var table = $("#tbl_visit").DataTable({
        serverSide: true,
        destroy: true,
        ajax: {
            type: 'post',
            url: '<?= base_url('table') ?>',
        }
    });
</script>
</body>

</html>