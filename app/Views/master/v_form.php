<form id="form-crud">
    <div class="form-group">
        <div class="row">
            <div class="col-3">
                <label for="name">Nama <span class="text-danger">*</span></label>
                <input type="hidden" name="id-visit" id="id-visit">
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="col-3">
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
            <div class="col-2">
                <br>
                <button type='submit' name="btn-crud" id="btn-crud" class='mt-2 w-75 btn btn-primary'>Save</button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <label for="amount">Nominal <span class="text-danger">*</span></label>
                <input class="form-control currency" type="text" id="amount" name="amount">
            </div>
            <div class="col-5">
                <label for="address">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" style="height: 150px;" name="address" id="address"></textarea>
            </div>
        </div>
    </div>
</form>

<script>
    // Disabled Past Date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    var cleaveC = new Cleave('.currency', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    today = yyyy + '-' + mm + '-' + dd;
    $('#tgl_in').attr('min', today);

    function editData(btn, id, link) {
        $('#btn-crud').html(btn);

        $.ajax({
            url: link,
            type: 'post',
            data: {
                visid: id,
            },
            dataType: 'json',
            success: function(res) {
                $('#id-visit').val(res.id)
                $('#name').val(res.name)
                $('#village').val(res.desa)
                $('#rt').val(res.rt)
                $('#rw').val(res.rw)
                $('#amount').val(res.nomin)
                $('#address').val(res.address)
                $('#tgl_in').val(res.tgl)
                $('html, body').animate({
                    scrollTop: 0
                }, 200);
            }
        });
    }

    $(document).ready(function() {
        $('#form-crud').on('submit', function(ev) {
            ev.preventDefault();

            var link = "<?= base_url('visitor/add') ?>";
            var dt = $(this).serialize();
            var pros = 'tambah';
            if ($('#btn-crud').html() == 'Update') {
                link = "<?= base_url('visitor/update') ?>";
                pros = 'update';
            }

            $.ajax({
                type: 'post',
                url: link,
                data: dt,
                dataType: 'json',
                success: function(res) {
                    if (res.success == 1) {
                        $.notify('Data berhasil di' + pros, 'success');
                        if ($('#btn-crud').html() != 'Save') {
                            $('#btn-crud').html("Save");
                        }
                        $('#total').val("Menghitung...")
                        setTimeout(() => {
                            setTimeout(() => {
                                $.ajax({
                                    url: "<?= base_url('nomin') ?>",
                                    success: function(res) {
                                        $('#total').val(res);
                                    }
                                });
                            }, 300);
                            table.ajax.reload();
                            $('#form-crud')[0].reset();
                        }, 200);
                    } else {
                        $.notify('Proses data Gagal!', 'error');
                    }
                }
            });
        });
    });
</script>