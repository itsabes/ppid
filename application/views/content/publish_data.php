<style>
    div.uppercase {
        text-transform: uppercase;
    }

    div.lowercase {
        text-transform: lowercase;
    }

    div.capitalize {
        text-transform: capitalize;
    }

    .modal-dialog {
        width: 900px;
    }

    .modal-header {
        background-color: #337AB7;
        padding: 10px 10px;
        color: #FFF;
        border-bottom: 2px dashed #337AB7;
    }
</style>

<div class="container">
    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-primary'>
                    <div class='box-header with-border'>
                        <h3 class="box-title">
                            <div class="uppercase"><?= $tipetext ?></div>
                        </h3>
                    </div>
                    <div class='box-body'>
                        <div class="row">
                            <?php if ($tipe == '23') { ?>
                                <div class="col-sm-3">
                                    <select data-placeholder="Pilih Kategori" class="form-control select2" style="width: 100%;" tabindex="2" name="Kategori" id="Kategori">
                                        <option value=""></option>
                                        <?php foreach ($combo_box as $combo_box) { ?>
                                            <option value="<?= $combo_box->nama ?>"><?= $combo_box->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div id="data_content" class="table-responsive">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <?php if ($tipe == '27') { ?>

                                        <?php } else { ?>
                                            <th>Isi Informasi</th>
                                        <?php } ?>

                                        <?php if ($tipe == 23) { ?>
                                            <th>Nama Dokumen</th>
                                        <?php } ?>

                                        <?php if ($tipe == 27) { ?>
                                            <th>Bulan</th>
                                        <?php } ?>

                                        <?php if ($tipe != 37) { ?>
                                            <th>Tahun</th>
                                        <?php } ?>

                                        <th style="text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    $judul = '';
                                    foreach ($content_data as $content) {
                                    ?>
                                        <tr>
                                            <?php if ($tipe == '27') { ?>

                                            <?php } else { ?>
                                                <td><?php
                                                    if ($content->JudulContent != $judul) {
                                                        echo $content->JudulContent;
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>
                                                </td>
                                            <?php } ?>

                                            <?php if ($tipe == 23) { ?>
                                                <td><?= $content->IsiContent ?></td>
                                            <?php } ?>

                                            <?php if ($tipe == 27) { ?>
                                                <td><?= $content->BulanData ?></td>
                                            <?php } ?>

                                            <?php if ($tipe != 37) { ?>
                                                <td><?= $content->TahunData ?></td>
                                            <?php } ?>

                                            <td style="text-align:center" width="190px">
                                                <?php if ($content->FileUpload != '') { ?>
                                                    <button onclick="showClick('<?= $content->IdContent ?>','<?= $content->FileUpload ?>')" type="button" class="btn btn-success btn-sm"><i class="fa fa-laptop"></i>&nbsp; [ Lihat Data ]</button>
                                                <?php } else { ?>
                                                    <p><strong>Dalam Proses </strong></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $judul = $content->JudulContent;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" class="form-control" id="files">
                <embed id="fileup" src="" type="application/pdf" width="100%" height="600px" /></embed>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;TUTUP</a>
            </div>
        </div>
    </div>
</div>

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
            "bInfo": false,
            "bAutoWidth": true,
            "aaSorting": [],
            "searching": true
        });
    });

    $("#Kategori").change(function() {
        var Kategori = $("#Kategori").val();
        $.ajax({
            url: "<?= base_url(); ?>content/ambil_data_regulasi",
            data: "Kategori=" + Kategori,
            cache: false,
            success: function(msg) {
                $("#data_content").html(msg);
            }
        })
    });

    function showClick(id, filepath) {
        $("#IdContent").val(id);
        $('#fileup').attr('src', "<?= base_url() . 'upload/content/'; ?>" + filepath);

        $("#mymodal").modal('show');
    }
</script>