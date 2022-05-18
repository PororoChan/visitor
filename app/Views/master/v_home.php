<?= $this->include('master/split-master/header') ?>
<?= $this->include('master/split-master/sidebar') ?>

<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header mb-0">
                <h5>Data Visitor</h5>
            </div>
            <div class="card-body">
                <form id="form-crud">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="name">Nama <span class="text-danger">*</span></label>
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
                                <input class="form-control" type="number" id="amount" name="amount">
                            </div>
                            <div class="col-5">
                                <label for="address">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" style="height: 150px;" name="address" id="address"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <!-- <button type="button" id="btn_tambah" class="btn btn-sm btn-round btn-primary mt-auto mb-2 float-right" onclick="modalTambah('Tambah Data', 'modal-xl', '<?= base_url('visitor/form') ?>')">
                            Tambah Data
                        </button> -->
                        <table class="table table-striped table-hover table-bordered table-head-fixed" id="tbl_visit" width="100%">
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