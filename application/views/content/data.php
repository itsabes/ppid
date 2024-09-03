<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Rumah Data<small><?= $tipetext ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Rumah Data</a></li>
        <li><a href="#"><?= $tipetext ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header with-border'>
                    <button onclick="addClick()" type="button" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                </div>
                <div class='box-body'>
                    <div id="data_content" class="table-responsive">
                        <table class="table" id="mytable">
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

                                    <?php if ($tipe <> 37) { ?>
                                        <th>Tahun</th>
                                    <?php } ?>

                                    <th>Diupload Oleh</th>
                                    <th>Tanggal Upload</th>
                                    <th style="text-align:center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($content_data as $content) {
                                ?>
                                    <tr>
                                        <?php if ($tipe == '27') { ?>

                                        <?php } else { ?>
                                            <td><?= $content->JudulContent ?></td>
                                        <?php } ?>

                                        <?php if ($tipe == 23) { ?>
                                            <td><?= $content->IsiContent ?></td>
                                        <?php } ?>

                                        <?php if ($tipe == 27) { ?>
                                            <td><?= $content->BulanData ?></td>
                                        <?php } ?>

                                        <?php if ($tipe <> 37) { ?>
                                            <td><?= $content->TahunData ?></td>
                                        <?php } ?>

                                        <td><?= $content->username ?></td>
                                        <td><?= $content->UpdateDate ?></td>
                                        <td style="text-align:center" width="190px">
                                            <button onclick="editClick('<?= $content->IdContent ?>')" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></button>

                                            <?php
                                            echo '  ';

                                            if ($tipe == 7) {
                                                echo anchor(
                                                    site_url('upload/skdr/' . $content->FileUpload),
                                                    '<i class="fa fa-file-pdf-o"></i>',
                                                    'title="Preview File" target="_blank" class="btn btn-info btn-xs"'
                                                );
                                            } else {
                                                echo anchor(
                                                    site_url('upload/content/' . $content->FileUpload),
                                                    '<i class="fa fa-file-pdf-o"></i>',
                                                    'title="Preview File" target="_blank" class="btn btn-info btn-xs"'
                                                );
                                            }

                                            echo '  ';

                                            echo anchor(
                                                site_url('content/delete/' . $content->IdContent . '/' . $tipe . '/' . $content->FileUpload),
                                                '<i class="fa fa-trash-o"></i>',
                                                'title="Delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Anda yakin hapus data ini ?\')"'
                                            );
                                            ?>
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
                            <td class="col-md-5">Isi Informasi
                                <?php if ($tipe == '27') { ?>

                                <?php } else if ($tipe == '21' or $tipe == '23') { ?>
                                    <select class="form-control" name="JudulContent" id="JudulContent">
                                        <?php if ($tipe == '21') { ?>
                                            <?php foreach ($combo_box as $combo_box) { ?>
                                                <option value="<?= $combo_box->nama ?>"><?= $combo_box->nama ?></option>
                                            <?php } ?>
                                        <?php } else if ($tipe == '23') { ?>
                                            <?php foreach ($combo_box as $combo_box) { ?>
                                                <option value="<?= $combo_box->nama ?>"><?= $combo_box->nama ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <input type="text" name="JudulContent" class="form-control" id="JudulContent">
                                <?php } ?>
                            </td>
                        </tr>

                        <?php if ($tipe == '23') { ?>
                            <tr>
                                <td class="col-md-5">Nama Dokumen
                                    <input type="text" name="IsiContent" class="form-control" id="IsiContent">
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if ($tipe == '27') { ?>
                            <tr>
                                <td class="col-md-5">Bulan
                                    <select class="form-control" name="BulanData" id="BulanData">
                                        <option value=""></option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if ($tipe <> '37') { ?>
                            <tr>
                                <td class="col-md-5">Tahun<br>
                                    <select class="form-control" name="TahunData" id="TahunData">
                                        <option value=""></option>
                                        <?php for ($i = 1980; $i <= date("Y"); $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>

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
                                <input type="hidden" name="Tipe" class="form-control" id="Tipe" value="<?= $tipe ?>">
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
            "bAutoWidth": true,
            "aaSorting": [],
            "searching": true
        });
    });

    function addClick() {
        $("#IdContent").val('');
        $("#JudulContent").val('');
        $("#IsiContent").val('');
        $("#BulanData").val('');
        $("#TahunData").val('');

        $("#delete").hide();
        $("#upload").show();

        $(".file-opsi").show();
        $(".file-delete").hide();
        $(".file-upload").show();
        $(".file-link").hide();

        $("#mymodal").modal('show');
    }

    function editClick(id) {
        $.ajax({
            url: "<?= base_url('content/edit') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdContent").val(r.IdContent)
                $("#BulanData").val(r.BulanData)
                $("#TahunData").val(r.TahunData);
                $("#JudulContent").val(r.JudulContent)
                $("#IsiContent").val(r.IsiContent)

                $("#delete").hide();
                $("#upload").show();

                $(".file-opsi").show();
                $(".file-delete").hide();
                $(".file-upload").show();
                $(".file-link").hide();

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
            url: "<?= base_url('content/store_data') ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                $('#mymodal').modal('hide');
                location.reload()
            },
            error: function(e) {}
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