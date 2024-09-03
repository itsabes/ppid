<!-- Formulir Header (Page header) -->
<section class="content-header">
    <h1>
        Submit Jawaban Permohonan Informasi Publik
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Submit Jawaban Permohonan Informasi Publik</a></li>
    </ol>
</section>

<!-- Main formulir -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header with-border'>
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-7">
                                <select data-placeholder="Pilih Tujuan Informasi..." class="form-control select2" style="width: 50%;" tabindex="2" name="Tujuan" id="Tujuan">
                                    <option value=""></option>
                                    <option value="Bertujuan untuk Penelitian">Bertujuan untuk Penelitian</option>
                                    <option value="Bertujuan untuk Data Awal Penelitian">Bertujuan untuk Data Awal Penelitian</option>
                                    <option value="Lain-Lain">Lain-Lain</option>
                                    <option value="semua">Semua Data</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <div class="pull-right">
                                    <a href="<?= base_url('formulir/exportresponselistexcel') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel-o"></i> Excel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='box-body'>
                    <div id="data_formulir" class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Permohonan</th>
                                    <th>Nama Pemohon</th>
                                    <th>Rincian Informasi</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Disposisi Bidang</th>
                                    <th>Disposisi Sie/SubBag</th>
                                    <th>Jawaban Sie/SubBag</th>
                                    <th>Status Permohonan</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($formulir_data as $formulir) {
                                ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td>
                                            <?= $formulir->Nomor ?>

                                            <?php if ($formulir->Status == 2) {
                                                echo "<button class='btn btn-info btn-xs'>PROSES REVISI</button>";
                                            } elseif ($formulir->Status == 3) {
                                                echo "<button class='btn btn-danger btn-xs'>SUDAH REVISI</button>";
                                            } ?>
                                        </td>
                                        <td><?= $formulir->Nama ?></td>
                                        <td><?= $formulir->RincianInformasi ?></td>
                                        <td><?= $formulir->CreatedDate ?></td>
                                        <td><?= $formulir->Bidang ?></td>
                                        <td><?= $formulir->Seksi ?></td>
                                        <td>
                                            <?php if (!empty($formulir->Response)) {
                                                echo $formulir->Response . '<br><br> Oleh : <b>' . $formulir->nama . '</b> pada ' . $formulir->ResponseDate;
                                            } else {
                                                echo "<button class='btn btn-sm btn-danger'>Belum Dibuatkan Jawaban</button>";
                                            } ?>
                                        </td>
                                        <td><?= status_permohonan($formulir->Status) ?></td>
                                        <td style="text-align:center" width="140px">
                                            <?php
                                            if (!empty($formulir->UploadPermohonan)) {
                                                echo "<button onclick='showClick( $formulir->IdFormulir )' type='button' class='btn btn-xs btn-warning'><i class='fa fa-file'></i></button>";

                                                echo ' | ';
                                            }

                                            if (!empty($formulir->UploadJawaban)) {
                                                echo anchor(site_url('upload/formulir/' . $formulir->UploadJawaban), '<i class="fa fa-file"></i>', 'title="Surat Jawaban" target="_blank" class="btn btn-info btn-xs"');

                                                echo ' | ';
                                            }

                                            echo anchor(site_url('formulir/permohonan_pdf/' . $formulir->IdFormulir), '<i class="fa fa-print"></i>', 'title="Print" target="_blank" class="btn btn-info btn-xs"');

                                            echo ' | ';
                                            ?>

                                            <button onclick="editClick('<?= $formulir->IdFormulir ?>')" type="button" title="Submit Jawaban" class="btn btn-xs btn-success"><i class="fa fa-laptop"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START FILE UPLOAD MODAL -->
<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">File Upload</h3>
            </div>
            <div class="modal-body">
                <img id="fileup" src="" width="100%" />
                <input type="hidden" name="row_id" id="id">
                <table class="table">
                    <tr>
                        <td class="col-md-8" colspan="2">Surat Permohonan
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadPermohonan"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">KAK/Proposal Penelitian
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadKak"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">FC KTP/KITAS Peneliti Utama
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadKartuIdentitas"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Upload Surat keterangan Kaji Etik
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadKeteranganKajiEtik"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Kuesioner Wawancara
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadKuisioner"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Surat Rekomendasi Penelitian dari PTSP
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadRekomPtsp"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Izin Riset/Klirens Etik Riset
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadIzinRiset"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Surat Keterangan Penelitian yang dikeluarkan oleh Direktorat Jenderal Politik dan Pemerintahan Umum Kementerian Dalam Negeri RI
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadKeteranganDirjen"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-8" colspan="2">Surat Pernyataan yang sudah ditandatangani (materai 10 ribu) akan menyerahkan laporan hasil penelitian beserta rekomendasi kebijakan dari hasil penelitian
                        </td>
                        <td class="col-md-4" colspan="2">
                            <p class="LinkUploadPernyataanHasil"></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
            </div>
        </div>
    </div>
</div>
<!-- END FILE UPLOAD MODAL -->

<!-- START FORM JAWABAN MODAL -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Form </h3>
            </div>
            <div class="modal-body">
                <form id="frm">
                    <input type="hidden" name="row_id" id="id">
                    <table class="table">
                        <tr>
                            <td class="col-md-3" colspan="2">Nomor Permohonan
                                <input class="form-control" name="Nomor" id="Nomor" placeholder="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Nama Pemohon
                                <input class="form-control" name="Nama" id="Nama" placeholder="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Kategori
                                <input class="form-control" name="Kategori" id="Kategori" placeholder="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Rincian Informasi
                                <textarea class="form-control" name="RincianInformasi" disabled id="RincianInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Tujuan Mendapatkan Informasi
                                <textarea class="form-control" name="TujuanInformasi" disabled id="TujuanInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </td>
                        </tr>
                        <?php if ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "sekpim") { ?>
                            <tr>
                                <td class="col-md-3" colspan="2">Disposisi Ke (Bidang)
                                    <select data-placeholder="Pilih Bidang..." class="form-control" style="width: 100%;" tabindex="2" name="Disposisibid" id="Disposisibid">
                                        <option value=""></option>
                                        <?php
                                        foreach ($data_bidang->result_array() as $dp) {
                                        ?>
                                            <option value="<?= $dp['IdBidang']; ?>"><?= $dp['Bidang']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "ctu_bid") { ?>
                            <tr>
                                <td class="col-md-3" colspan="2">Disposisi Ke (Seksi / Sub-Bagian)
                                    <select data-placeholder="Pilih Seksi / Sub-Bagian..." class="form-control" style="width: 100%;" tabindex="2" name="Disposisi" id="Disposisi">
                                        <option value=""></option>
                                        <?php
                                        foreach ($data_seksi->result_array() as $dp) {
                                        ?>
                                            <option value="<?= $dp['IdSeksi']; ?>"><?= $dp['Seksi']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" class="form-control" value="<?= $organisasi_sess ?>">
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator") { ?>
                            <tr>
                                <td class="col-md-3" colspan="2">Jawaban dari PPID
                                    <textarea class="form-control" name="Response" id="Response" placeholder="Submit Jawaban dari PPID di sini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="col-md-3" colspan="2">Upload Surat Jawaban
                                    <input type="file" name="UploadJawaban" class="form-control" id="UploadJawaban">
                                </td>
                            </tr>
                        <?php } ?>

                        <tr>
                            <td class="col-md-3" colspan="2">Tindak Lanjut
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value=2>
                                    <label class="form-check-label" for="status2">
                                        Revisi
                                    </label>
                                </div>

                                <div id="component-tidak-lanjut">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status5" value=5>
                                        <label class="form-check-label" for="status5">
                                            Dialihkan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status6" value=6>
                                        <label class="form-check-label" for="status6">
                                            Selesai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status7" value=7>
                                        <label class="form-check-label" for="status7">
                                            Ditolak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="col-md-5">
                                <input type="hidden" name="IdFormulir" class="form-control" id="IdFormulir">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
                <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right" id="btn-submit"><i class="fa fa-check"></i> &nbsp;&nbsp;SUBMIT JAWABAN</a>

                <button type="button" class="btn btn-primary" id="btnloading"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END FORM JAWABAN MODAL -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#mytable").DataTable({
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true,
            "searching": true,
        });

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?= base_url('formulir/get_selesai_revisi') ?>",
            success: function(val) {
                let data = []

                $.each(val, function(key, value) {
                    data.push(`Permohonan nomor ${value.Nomor} dengan tujuan informasi ${value.TujuanInformasi} sudah selesai revisi`);
                });
                notif = data.join("\n");
                if (notif != '') {
                    alert(notif);
                }
            }
        });
    });

    $("#Tujuan").change(function() {
        let Tujuan = $("#Tujuan").val();
        $("#data_formulir").append('');

        if (Tujuan == "Bertujuan untuk Penelitian") {
            $("#export-excel").attr("href", "<?= base_url(); ?>formulir/pene_exportresponselistexcel/");
        } else if (Tujuan == "Bertujuan untuk Data Awal Penelitian") {
            $("#export-excel").attr("href", "<?= base_url(); ?>formulir/dataawal_exportresponselistexcel/");
        } else if (Tujuan == "Lain-Lain") {
            $("#export-excel").attr("href", "<?= base_url(); ?>formulir/lain_exportresponselistexcel/");
        } else {
            $("#export-excel").attr("href", "<?= base_url(); ?>formulir/exportresponselistexcel/");
        }

        $.ajax({
            url: "<?= base_url(); ?>formulir/get_respon_filter/",
            method: "POST",
            data: "Tujuan=" + Tujuan,
            success: function(msg) {
                $("#data_formulir").html(msg);
            }
        })
    });

    function showClick(id) {
        var baselink = "<?= base_url('upload/permohonan/') ?>";
        $.ajax({
            url: "<?= base_url('formulir/edit') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdFormulir").val(r.IdFormulir)

                var fpermohonan = r.UploadPermohonan;
                if (fpermohonan == null || fpermohonan == "") {
                    $(".LinkUploadPermohonan").hide();
                } else {
                    linkpermohonan = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpermohonan + "' title='Surat Permohonan' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadPermohonan").html(linkpermohonan);
                    $(".LinkUploadPermohonan").show();
                }

                var fkak = r.UploadKak;
                if (fkak == null || fkak == "") {
                    $(".LinkUploadKak").hide();
                } else {
                    linkkak = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkak + "' title='KAK' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadKak").html(linkkak);
                    $(".LinkUploadKak").show();
                }

                var fkartuidentitas = r.UploadKartuIdentitas;
                if (fkartuidentitas == null || fkartuidentitas == "") {
                    $(".LinkUploadKartuIdentitas").hide();
                } else {
                    linkkartuidentitas = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkartuidentitas + "' title='Kartu Identitas' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadKartuIdentitas").html(linkkartuidentitas);
                    $(".LinkUploadKartuIdentitas").show();
                }

                var fketerangankajietik = r.UploadKeteranganKajiEtik;
                if (fketerangankajietik == null || fketerangankajietik == "") {
                    $(".LinkUploadKeteranganKajiEtik").hide();
                } else {
                    linkketerangankajietik = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangankajietik + "' title='Keterangan Kaji Etik' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadKeteranganKajiEtik").html(linkketerangankajietik);
                    $(".LinkUploadKeteranganKajiEtik").show();
                }

                var fkuisioner = r.UploadKuisioner;
                if (fkuisioner == null || fkuisioner == "") {
                    $(".LinkUploadKuisioner").hide();
                } else {
                    linkkuisioner = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fkuisioner + "' title='Kuisioner' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadKuisioner").html(linkkuisioner);
                    $(".LinkUploadKuisioner").show();
                }

                var frekomptsp = r.UploadRekomPtsp;
                if (frekomptsp == null || frekomptsp == "") {
                    $(".LinkUploadRekomPtsp").hide();
                } else {
                    linkrekomptsp = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + frekomptsp + "' title='Rekomendasi PTSP' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadRekomPtsp").html(linkrekomptsp);
                    $(".LinkUploadRekomPtsp").show();
                }

                var fizinriset = r.UploadIzinRiset;
                if (fizinriset == null || fizinriset == "") {
                    $(".LinkUploadIzinRiset").hide();
                } else {
                    linkizinriset = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fizinriset + "' title='Izin Riset' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadIzinRiset").html(linkizinriset);
                    $(".LinkUploadIzinRiset").show();
                }

                var fketerangandirjen = r.UploadKeteranganDirjen;

                if (fketerangandirjen == null || fketerangandirjen == "") {
                    $(".LinkUploadKeteranganDirjen").hide();
                } else {
                    linkketerangandirjen = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fketerangandirjen + "' title='Keterangan Dirjen' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadKeteranganDirjen").html(linkketerangandirjen);
                    $(".LinkUploadKeteranganDirjen").show();
                }

                var fpernyataanhasil = r.UploadPernyataanHasil;

                if (fpernyataanhasil == null || fpernyataanhasil == "") {
                    $(".LinkUploadPernyataanHasil").hide();
                } else {
                    linkpernyataanhasil = "<button class'btn btn-warning btn-xs'> <a href='" + baselink + "" + fpernyataanhasil + "' title='Pernyataan Hasil' target='_blank'><i class='fa fa-file'></i><a></button>";
                    $(".LinkUploadPernyataanHasil").html(linkpernyataanhasil);
                    $(".LinkUploadPernyataanHasil").show();
                }

                $("#detailmodal").modal('show')
            }
        })
    }

    function editClick(id) {
        $('input[name="status"]').prop('checked', false);

        $('#btnloading').hide().prop('disabled', true);
        $('#btn-submit').show();

        $.ajax({
            url: "<?= base_url('formulir/edit') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdFormulir").val(r.IdFormulir)
                $("#Nomor").val(r.Nomor)
                $("#Nama").val(r.Nama)
                $("#Kategori").val(r.Kategori)
                $("#RincianInformasi").val(r.RincianInformasi)
                $("#TujuanInformasi").val(r.TujuanInformasi)
                $("#Disposisi").val(r.Disposisi)
                $("#Disposisibid").val(r.Disposisibid)
                $("#Response").val(r.Response)
                $("#status" + r.Status).val(r.Status).prop('checked', 'true')

                if (r.Disposisibid === null) {
                    $('#component-tidak-lanjut').hide();
                } else {
                    $('#component-tidak-lanjut').show();
                }

                $("#mymodal").modal('show')
            }
        })
    }

    function submitDocClick() {
        var form = $("#frm")[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('formulir/store_response') ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function() {
                $('#btnloading').show().prop('disabled', true);
                $('#btn-submit').hide();
            },
            success: function(data) {
                $('#mymodal').modal('hide');

                location.reload()
            },
            error: function(e) {

            }
        });
    }
</script>