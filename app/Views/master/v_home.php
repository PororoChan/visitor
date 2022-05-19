<?= $this->include('master/split-master/header') ?>
<?= $this->include('master/split-master/sidebar') ?>

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header mb-0">
                <h5>Data Visitor</h5>
            </div>
            <div class="card-body">
                <?= $this->include('master/v_form') ?>
                <hr>
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <!-- <button type="button" id="btn_tambah" class="btn btn-sm btn-round btn-primary mt-auto mb-2 float-right" onclick="modalTambah('Tambah Data', 'modal-xl', '<?= base_url('visitor/form') ?>')">
                            Tambah Data
                        </button> -->
                        <table class="table table-striped table-hover table-bordered table-head-fixed" id="tbl_visit" width="100%">
                            <div class="form-inline float-right mb-2">
                                <label for="total">Total: &nbsp;</label>
                                <input type="text" id="total" name="total" class="form-control" value="Rp. <?= $total ?>" disabled>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Tgl. Datang</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?= $this->include('master/split-master/footer') ?>