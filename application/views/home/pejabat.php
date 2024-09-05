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
                            <!-- <div class="col-md-4">
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="http://ppid-dinkes.jakarta.go.id/upload/image/ibu-kadis.png" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Widyastuti, MKM</h3>

                                        <p class="text-muted text-center">Kepala Dinas Kesehatan</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Widyastuti, MKM</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Semarang, 29-06-1964</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Agama</b> <a class="pull-right">Islam</a>
                                            </li>
                                        </ul>

                                        <button onclick="showClick('kadis')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/direktur.JPG') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Herni Lestyaningsih, MARS</h3>

                                        <p class="text-muted text-center">Direktur RSUD Sawah Besar</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Herni Lestyaningsih, MARS</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Jakarta, 16-03-1975</a>
                                            </li>
                                            <!-- <li class="list-group-item">
                                                <b>Agama</b> <a class="pull-right">Islam</a>
                                            </li> -->
                                        </ul>

                                        <button onclick="showClick('direktur')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

							<div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/yanmed.JPG') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">dr. Finan Setianto Santana</h3>

                                        <p class="text-muted text-center">Kepala Seksi Pelayanan Medis</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">dr. Finan Setianto Santana</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Jakarta, 25-03-1983</a>
                                            </li>
                                            <!-- <li class="list-group-item">
                                                <b>Agama</b> <a class="pull-right">Islam</a>
                                            </li> -->
                                        </ul>

                                        <button onclick="showClick('yanmed')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="box box-solid">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="<?= site_url('upload/image/penunjang.png') ?>" alt="User profile picture">

                                        <h3 class="profile-username text-center">Indra, Apt</h3>

                                        <p class="text-muted text-center">Kepala Seksi Penunjang</p>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Nama</b> <a class="pull-right">Indra, Apt</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="pull-right">Bukittinggi, 26-12-1978</a>
                                            </li>
                                            <!-- <li class="list-group-item">
                                                <b>Agama</b> <a class="pull-right">Islam</a>
                                            </li> -->
                                        </ul>
                                        <button onclick="showClick('penunjang')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
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
            filepath = 'Biodata-Direktur(dr.Herni).pdf';
        } else if (pos == 'yanmed') {
            filepath = 'Biodata-Kayanmed (dr.Finan).pdf';
        } else if (pos == 'penunjang') {
            filepath = 'Biodata-Kayanjang (indra, Apt).pdf';
        }

        $('#fileup').attr('src', "<?php echo base_url() . 'upload/dokumen/'; ?>" + filepath);
        $("#mymodal").modal('show');
    }
</script>
