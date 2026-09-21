<div class="container">
    <br>
    <!-- Main content -->
    <section class='content'>
        <div class='row'>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class='box-header with-border'>
                        <h3 class="box-title">
                            <div class="uppercase">PROFIL SINGKAT PEJABAT STRUKTURAL RSUD SAWAH BESAR</div>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row justify-content-md-center">

                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/direktur.png') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Ekonugroho Budhi Prasetyo, MARS</h3>

                                        <p class="text-muted text-center">Direktur RSUD Sawah Besar</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Ekonugroho Budhi Prasetyo, MARS</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Jakarta, 01-06-1981</a>
                                            </li>
                                        </ul>

                                        <button onclick="showClick('direktur')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

							<div class="col-md-6">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/yanmed.png') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Vellyana Gustika, MARS</h3>

                                        <p class="text-muted text-center">Kepala Seksi Pelayanan Medik dan Keperawatan</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Vellyana Gustika, MARS</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Dili, 09-08-1989</a>
                                            </li>
                                        </ul>

                                        <button onclick="showClick('yanmed')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <div class="col-md-6">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/penunjang.png') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Irvieny Rumondang S.,MKK</h3>

                                        <p class="text-muted text-center">Kepala Seksi Pelayanan Penunjang</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Irvieny Rumondang S.,MKK</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Rantau Prapat, 28-10-1972</a>
                                            </li>
                                        </ul>
                                        <button onclick="showClick('penunjang')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </div>

                            <div class="col-md-6">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/tatausaha.png') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">Ns. Syaiful Anwar, S. Kep, MKM</h3>

                                        <p class="text-muted text-center">Kepala Sub Bagian Tata Usaha</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">Ns. Syaiful Anwar, S. Kep, MKM</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Jakarta, 30-10-1973</a>
                                            </li>
                                        </ul>
                                        <button onclick="showClick('tatausaha')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input type="text" class="form-control" id="files">
                <embed id="fileup" src="" type="application/pdf" width="100%" height="600px" /></embed>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<script type="text/javascript">
    $("#Periode").change(function() {
        var Periode = $("#Periode").val();
        $.ajax({
            url: "<?php echo base_url(); ?>content/ambil_data_content",
            data: "Periode=" + Periode,
            cache: false,
            success: function(msg) {
                $("#data_content").html(msg);
                //window.location.assign("<?php echo base_url(); ?>teknikal/teknisi");
            }
        })
    });

    //$('#data_pembbu').load('<?php echo base_url(); ?>belanja/ambil_data_outlet_session');

    function showClick(pos) {
        if (pos == 'direktur') {
            filepath = 'Biodata-Direktur.pdf';
        } else if (pos == 'yanmed') {
            filepath = 'Biodata-Yanmed.pdf';
        } else if (pos == 'penunjang') {
            filepath = 'Biodata-Penunjang.pdf';
        } else if (pos == 'tatausaha') {
            filepath = 'Biodata-TataUsaha.pdf'; // Pastikan nama file ini sesuai di folder upload/dokumen
        }

        $('#fileup').attr('src', "<?php echo base_url() . 'upload/dokumen/'; ?>" + filepath);
        $("#mymodal").modal('show');
    }
</script>
