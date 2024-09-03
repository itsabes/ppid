<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manajemen Unit Kerja
        <small>Data Unit Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Unit Kerja</li>
    </ol>
</section>

<section class='content'>
    <div class='row'>
        <div class="col-md-12">
            <div class="box box-solid">
                <div class='box-header with-border'>
                    <?php if ($level_sess === "admin") { ?>
                        <a href="<?php echo base_url('unitkerja/exportexcel') ?>" class="btn btn-success btn-sm btn-flat" id="export-excel"><i class="fa fa-file-excel-o"></i> Excel</a>

                        <button onclick="addClick('')" type='button' class='btn btn-sm btn-primary'><i class='fa fa-plus'></i> Tambah Data</button>
                    <?php } ?>
                </div>
                <div class='box-body'>
                    <div id="data_content" class="table-responsive">
                        <table class="table " id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Unit Kerja</th>
                                    <th>Nama Unit Kerja</th>
                                    <th>Telepon</th>
                                    <th>Faximile</th>
                                    <th>Alamat</th>
                                    <th>Website Unit Kerja</th>
                                    <th>Website PPID</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($uk_data as $uk) {
                                ?>
                                    <tr>
                                        <td><?= ++$start; ?></td>
                                        <td><?= $uk->JenisUk; ?></td>
                                        <td><?= $uk->NamaUk; ?></td>
                                        <td><?= $uk->Telepon; ?></td>
                                        <td><?= $uk->Faximile; ?></td>
                                        <td><?= $uk->Alamat; ?></td>
                                        <td><a href="<?= $uk->WebUnitKerja; ?>" target="_blank"><?= $uk->WebUnitKerja; ?></a></td>
                                        <td><a href="<?= $uk->WebPpid; ?>" target="_blank"><?= $uk->WebPpid; ?></a></td>
                                        <td style="text-align:center" width="140px">
                                            <button onclick="showClick('<?= $uk->IdUnitKerja ?>')" type='button' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></button>
                                            <button onclick="editClick('<?= $uk->IdUnitKerja ?>')" type="button" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></button>
                                            <?php
                                            echo anchor(site_url('unitkerja/delete/' . $uk->IdUnitKerja), '<i class="fa fa-trash-o"></i>', 'title="Delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Anda Yakin Hapus Formulir ini ?\')"');
                                            ?>
                                        </td>
                                    </tr>
                                <?php
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

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data UKPD dan UPT</h3>
            </div>
            <div class="modal-body">
                <form id="frm">
                    <input type="hidden" name="IdUnitKerja" id="IdUnitKerja">
                    <table class="table">
                        <tr>
                            <td class="col-md-3" colspan="2">Jenis Unit Kerja
                                <select name="JenisUk" id="JenisUk" class="form-control">
                                    <option value=""></option>
                                    <option value="Suku Dinas Kesehatan">Suku Dinas Kesehatan</option>
                                    <option value="Unit Pelaksana Teknis (UPT)">Unit Pelaksana Teknis (UPT)</option>
                                    <option value="Rumah Sehat Jakarta">Rumah Sehat Jakarta</option>
                                    <option value="Puskesmas">Puskesmas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Nama Unit Kerja
                                <input class="form-control" name="NamaUk" id="NamaUk" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Telepon
                                <input class="form-control" name="Telepon" id="Telepon" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Faximile
                                <input class="form-control" name="Faximile" id="Faximile" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Alamat
                                <input class="form-control" name="Alamat" id="Alamat" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Website Unit Kerja
                                <input class="form-control" name="WebUnitKerja" id="WebUnitKerja" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Website PPID
                                <input class="form-control" name="WebPpid" id="WebPpid" placeholder="">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-md btn-default pull-left"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;KEMBALI</a>
                <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right" id="btnedit"><i class="fa fa-check"></i> &nbsp;&nbsp;SIMPAN</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#table1").DataTable({
            "lengthMenu": [
                [10, 30, 40, 50, -1],
                [10, 30, 40, 50, "All"]
            ],
            "bPaginate": true,
            // "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": false,
            "ordering": false,
            "searching": true,
            "responsive": true
        });
    });

    function addClick() {
        $("#IdUnitKerja").val('').attr('readonly', true);
        $("#JenisUk").val('').attr('disabled', false);
        $("#NamaUk").val('').attr('readonly', false);
        $("#Telepon").val('').attr('readonly', false);
        $("#Faximile").val('').attr('readonly', false);
        $("#Alamat").val('').attr('readonly', false);
        $("#WebUnitKerja").val('').attr('readonly', false);
        $("#WebPpid").val('').attr('readonly', false);

        $("#btnedit").show();
        $("#mymodal").modal('show');
    }

    function showClick(id) {
        $.ajax({
            url: "<?= base_url('unitkerja/read') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdUnitKerja").val(r.IdUnitKerja).attr('readonly', true);
                $("#JenisUk").val(r.JenisUk).attr('disabled', true);
                $("#NamaUk").val(r.NamaUk).attr('readonly', true);
                $("#Telepon").val(r.Telepon).attr('readonly', true);
                $("#Faximile").val(r.Faximile).attr('readonly', true);
                $("#Alamat").val(r.Alamat).attr('readonly', true);
                $("#WebUnitKerja").val(r.WebUnitKerja).attr('readonly', true);
                $("#WebPpid").val(r.WebPpid).attr('readonly', true);

                $("#btnedit").hide();
                $("#mymodal").modal('show');
            }
        })
    }

    function editClick(id) {
        $.ajax({
            url: "<?= base_url('unitkerja/read') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdUnitKerja").val(r.IdUnitKerja).attr('readonly', false);
                $("#JenisUk").val(r.JenisUk).attr('disabled', false);
                $("#NamaUk").val(r.NamaUk).attr('readonly', false);
                $("#Telepon").val(r.Telepon).attr('readonly', false);
                $("#Faximile").val(r.Faximile).attr('readonly', false);
                $("#Alamat").val(r.Alamat).attr('readonly', false);
                $("#WebUnitKerja").val(r.WebUnitKerja).attr('readonly', false);
                $("#WebPpid").val(r.WebPpid).attr('readonly', false);

                $("#btnedit").show();
                $("#mymodal").modal('show');
            }
        })
    }

    function submitDocClick() {
        var form = $("#frm")[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            // enctype: 'multipart/form-data',
            url: "<?= base_url('unitkerja/store') ?>",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(data) {
                //var r = eval("(" + data + ")");
                //if (r.status) {
                //Swal.fire('Info',r.msg,'success');
                $('#mymodal').modal('hide');
                location.reload()
                //}
            },
            error: function(e) {

            }
        });
    }
</script>