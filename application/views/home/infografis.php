<br>
<div class="container">
    <section class='content'>
        <div class='row'>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 style="text-align: center;font-weight: bold;font-size: 22px; margin: 20px 0;display: block">Infografis Layanan Informasi Publik - Dinas Kesehatan Provinsi DKI Jakarta</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/1.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('1.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/2.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('2.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/3.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('3.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/4.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('4.jpg')">Lihat</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/5.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('5.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/DIPA PPID-01.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('DIPA PPID-01.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/Realisasi Anggaran Dinas Kesehatan Tahun 2022 -01.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('Realisasi Anggaran Dinas Kesehatan Tahun 2022 -01.jpg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/informasi-ppid.jpeg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('informasi-ppid.jpeg')">Lihat</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/prosedur-permohonan.jpeg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('prosedur-permohonan.jpeg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/prosedur-keberatan.jpeg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('prosedur-keberatan.jpeg')">Lihat</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-default">
                                    <div class="box-body">
                                        <img src="<?php echo site_url('upload/image/kanal-info-PPID-01.jpg') ?>" width="100%">
                                    </div>
                                    <button class="btn btn-info btn-block" onclick="showClick('kanal-info-PPID-01.jpg')">Lihat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <img id="fileup" src="" width="100%" />
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<script type="text/javascript">
    function showClick(filepath) {
        $('#fileup').attr('src', "<?php echo base_url() . 'upload/image/'; ?>" + filepath);

        $("#mymodal").modal('show');
    }
</script>