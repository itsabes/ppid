<div class="container">
    <section class='content'>
        <div class='row'>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class='box-header with-border'>
                        <h3 class="box-title">
                            <div class="uppercase"><?= $title . ' ' . namaweb();  ?></div>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row justify-content-md-center">
                            <?php foreach ($pejabat as $pejabat) { ?>
                                <div class="col-md-4">
                                    <div class="box box-solid">
                                        <div class="box-body box-profile">
                                            <img class="profile-user-img img-responsive" src="<?= site_url('upload/pejabat-struktural/') . $pejabat->foto_pejabat_struktural ?>" alt="User profile picture">

                                            <h3 class="profile-username text-center"><?= $pejabat->nama_pejabat_struktural ?></h3>

                                            <p class="text-muted text-center"><?= $pejabat->jabatan_pejabat_struktural ?></p>

                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <b>Nama</b> <a class="pull-right"><?= $pejabat->nama_pejabat_struktural ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tempat, Tanggal Lahir</b> <a class="pull-right"><?= $pejabat->ttl_pejabat_struktural ?></a>
                                                </li>
                                            </ul>
                                            <button onclick="showClick('<?= $pejabat->lampiran_pejabat_struktural ?>')" type="button" class="btn btn-primary btn-block">Selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- START MODAL LAMPIRAN -->
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
</div>
<!-- END MODAL LAMPIRAN -->

<script type="text/javascript">
    function showClick(file) {
        $('#fileup').attr('src', "<?php echo base_url() . 'upload/pejabat-struktural/'; ?>" + file);
        $("#mymodal").modal('show');
    }
</script>