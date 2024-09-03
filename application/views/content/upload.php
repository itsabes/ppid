<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Informasi Publik<small><?= $Tipe ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Informasi Publik</a></li>
        <li><a href="#"><?= $Tipe ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-body'>
                    <div id="data_content" class="table-responsive">
                        <table class="table" id="">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ringkasan Isi Informasi</th>
                                    <th style="text-align:center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($content_data as $content) {
                                ?>
                                    <tr>
                                        <td><?= $content->NoContent ?></td>
                                        <td><?= $content->JudulContent ?></td>
                                        <td style="text-align:center" width="190px">
                                            <!-- JIKA FILE UPLOAD ADA -->
                                            <?php
                                            if ($content->FileUpload <> '') {
                                                echo anchor(
                                                    site_url('upload/content/' . $content->FileUpload),
                                                    '<i class="fa fa-check"></i> Terupload',
                                                    array(
                                                        'title' => 'Sudah di-Upload',
                                                        'class' => 'btn btn-info btn-sm',
                                                        'target' => '_blank'
                                                    )
                                                );
                                            ?>

                                                <button onclick="deleteClick('<?= $content->IdContent ?>', '<?= $content->JudulContent ?>')" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> hapus</button>

                                                <!-- JIKA URL LINK ADA -->
                                            <?php
                                            } else if ($content->UrlLink <> '') {
                                                echo anchor(
                                                    $content->UrlLink,
                                                    '<i class="fa fa-globe"></i> URL Link',
                                                    array(
                                                        'title' => 'URL Link',
                                                        'class' => 'btn btn-primary btn-sm',
                                                        'target' => '_blank'
                                                    )
                                                );
                                            ?>

                                                <button onclick="deleteClick('<?= $content->IdContent ?>', '<?= $content->JudulContent ?>')" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> hapus</button>

                                                <!-- JIKA TIDAK ADA FILE UPLOAD DAN URL LINK -->
                                            <?php } else { ?>
                                                <button onclick="uploadClick('<?= $content->IdContent ?>', '<?= $content->JudulContent ?>')" type="button" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload / URL</button>
                                            <?php } ?>
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

<!-- MODAL START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body">
                <form id="frm">
                    <input type="hidden" name="row_id" id="id">
                    <table class="table">
                        <tr>
                            <td class="col-md-5">Ringkasan Isi Informasi
                                <input class="form-control" name="JudulContent" id="JudulContent" placeholder="Ringkasan Isi Informasi" readonly="readonly">
                            </td>
                        </tr>
                        <tr class="file-opsi">
                            <td class="col-md-5">
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="StatusFile" id="StatusFile1" value="1" onChange="pilih_upload();" checked>
                                            File Upload
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="StatusFile" id="StatusFile2" value="2" onChange="pilih_url();">
                                            URL Link / File Link
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="file-upload">
                            <td class="col-md-5">File Upload
                                <input type="file" name="FileUpload" class="form-control" id="FileUpload">
                                <font color="red">hanya file yang ber-ekstensi pdf, doc, docx, xls, xlsx, jpg, jpeg, png</font>
                            </td>
                        </tr>
                        <tr class="file-link">
                            <td class="col-md-5">URL Link / File Link
                                <input type="text" name="UrlLink" class="form-control" id="UrlLink">
                                <font>masukkan alamat / URL website atau file yang dituju</font>
                            </td>
                        </tr>
                        <tr class="file-delete">
                            <td class="col-md-5">
                                <strong>
                                    <h3>Apakah File / URL akan dihapus ??</h3>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-5">
                                <input type="hidden" name="IdContent" class="form-control" id="IdContent">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
                <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right" id="upload"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</a>
                <a href="javascript:void(0)" onclick="deleteDocClick()" class="btn btn-md btn-danger float-right" id="delete"><i class="fa fa-trash"></i> &nbsp;&nbsp;HAPUS</a>
            </div>
        </div>
    </div>
</div>
<!-- MODAL END -->

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
            "bAutoWidth": true
        });
    });

    // SAAT KLIk BUTTON UPLOAD / URL
    function uploadClick(id, judul) {
        $("#IdContent").val(id);
        $("#JudulContent").val(judul);

        $("#delete").hide();
        $("#upload").show();

        $(".file-opsi").show();
        $(".file-delete").hide();
        $(".file-upload").show();
        $(".file-link").hide();

        $("#mymodal").modal('show');
    }

    // SAAT KLIK BUTTON HAPUS
    function deleteClick(id, judul) {
        $("#IdContent").val(id);
        $("#JudulContent").val(judul);

        $("#delete").show();
        $("#upload").hide();

        $(".file-opsi").hide();
        $(".file-delete").show();
        $(".file-upload").hide();
        $(".file-link").hide();

        $("#mymodal").modal('show');
    }

    // ACTION SIMPAN
    function submitDocClick() {
        var form = $("#frm")[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('content/act_upload') ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#mymodal').modal('hide');
                location.reload()
            },
            error: function(e) {

            }
        });
    }

    // ACTION DELETE
    function deleteDocClick() {
        var form = $("#frm")[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: "<?= base_url('content/act_delete') ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#mymodal').modal('hide');
                location.reload()
            },
            error: function(e) {

            }
        });
    }

    function pilih_upload() {
        $(".file-upload").show();
        $(".file-link").hide();
    }

    function pilih_url() {
        $(".file-upload").hide();
        $(".file-link").show();
    }
</script>