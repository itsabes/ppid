<div class="container">
    <section class="content formulir">
        <div class="row">
            <div class="col-md-12">
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">Cek Status Pengajuan Keberatan Informasi Publik</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>
                                    <font size="4">Identitas Pengajuan Keberatan</font>
                                </strong>
                            </div>
                            <div class="form-group">
                                <label>Nomor Pengajuan Keberatan</label>
                                <input type="text" class="form-control" id="Nomor" name="Nomor" placeholder="">
                                <?= form_error('Nomor') ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="Email" name="Email" placeholder="">
                                <?= form_error('Email') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="cekClick()" class="btn btn-primary btn-block"> Cek Status Pengajuan Keberatan</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>
                                    <font size="4">Status Data Pengajuan Keberatan</font>
                                </strong>
                            </div>
                            <div id="data_keberatan">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function cekClick() {
        var nomor = $("#Nomor").val();
        var email = $("#Email").val();

        $.ajax({
            url: "<?= base_url(); ?>formulir/ambil_data_keberatan",
            data: "nomor=" + nomor + "&email=" + email,
            cache: false,
            success: function(msg) {
                $("#data_keberatan").html(msg);
            }
        })
    }
</script>