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
                <div class='box-header with-border'>
                    <button onclick="addClick()" type="button" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Informasi</th>
                                <th>Ringkasan Isi Informasi</th>
                                <th>Pejabat/Unit/Satker yang menguasai informasi</th>
                                <th>Penanggungjawab pembuatan atau penerbitan informasi</th>
                                <th>Waktu dan tempat pembuatan informasi</th>
                                <th>Bentuk informasi yang tersedia</th>
                                <th>Jangka waktu penyimpanan atau retensi arsip</th>
                                <th>Jenis media yang memuat informasi</th>
                                <th style="text-align:center">Action</th>
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
                                    <td><?= $content->IsiContent ?></td>
                                    <td><?= $content->PejabatInformasi ?></td>
                                    <td><?= $content->PenanggungJawab ?></td>
                                    <td><?= $content->WaktuInformasi ?></td>
                                    <td><?= $content->BentukInformasi ?></td>
                                    <td><?= $content->JangkaWaktu ?></td>
                                    <td><?= $content->JenisMedia ?></td>
                                    <td style="text-align:center" width="140px">
                                        <button onclick="editClick('<?= $content->IdContent ?>')" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></button>

                                        <?php
                                        echo '  ';
                                        echo anchor(site_url('content/delete/' . $content->IdContent . '/' . $content->Tipe . '/' . $content->FileUpload), '<i class="fa fa-trash-o"></i>', 'title="Delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
</section>

<!-- MODAL START -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Form </h3>
            </div>
            <div class="modal-body">
                <form id="frm">
                    <input type="hidden" name="IdContent" class="form-control" id="IdContent">
                    <input type="hidden" name="Tipe" class="form-control" id="Tipe" value="<?= $IdTipe; ?>">
                    <table class="table">
                        <tr>
                            <td class="col-md-3" colspan="2">No
                                <input class="form-control" name="NoContent" id="NoContent" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Judul Informasi
                                <input class="form-control" name="JudulContent" id="JudulContent" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Ringkasan Isi Informasi
                                <input class="form-control" name="IsiContent" id="IsiContent" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Pejabat/Unit/Satker yang menguasai informasi
                                <input class="form-control" name="PejabatInformasi" id="PejabatInformasi" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Penanggungjawab pembuatan atau penerbitan informasi
                                <input class="form-control" name="PenanggungJawab" id="PenanggungJawab" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Waktu dan tempat pembuatan informasi
                                <input class="form-control" name="WaktuInformasi" id="WaktuInformasi" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Bentuk informasi yang tersedia
                                <input class="form-control" name="BentukInformasi" id="BentukInformasi" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Jangka waktu penyimpanan atau retensi arsip
                                <input class="form-control" name="JangkaWaktu" id="JangkaWaktu" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Jenis media yang memuat informasi
                                <input class="form-control" name="JenisMedia" id="JenisMedia" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Is Active
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="IsActive" id="IsActive_1" value="1">
                                        Ya
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="IsActive" id="IsActive_0" value="0">
                                        Tidak
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Url Link
                                <input class="form-control" name="UrlLink" id="UrlLink" placeholder="">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
                <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</a>
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
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true,
            "scrollX": true
        });
    });

    function addClick() {
        let form = document.querySelector('form');
        form.reset();

        $("#IsActive_1").prop('checked', true);

        $("#mymodal").modal('show');
    }

    function editClick(id) {
        $.ajax({
            url: "<?= base_url('content/edit') ?>/" + id,
            success: function(e) {
                let form = document.querySelector('form');
                form.reset();

                var r = eval("(" + e + ")");
                $("#IdContent").val(r.IdContent)
                $("#Tipe").val(r.Tipe)
                $("#NoContent").val(r.NoContent)
                $("#JudulContent").val(r.JudulContent)
                $("#IsiContent").val(r.IsiContent)
                $("#PejabatInformasi").val(r.PejabatInformasi)
                $("#PenanggungJawab").val(r.PenanggungJawab)
                $("#WaktuInformasi").val(r.WaktuInformasi)
                $("#BentukInformasi").val(r.BentukInformasi)
                $("#JangkaWaktu").val(r.JangkaWaktu)
                $("#JenisMedia").val(r.JenisMedia)
                $(`#IsActive_${r.IsActive}`).prop('checked', true)
                $("#UrlLink").val(r.UrlLink)

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
            url: "<?= base_url('content/store') ?>",
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
</script>