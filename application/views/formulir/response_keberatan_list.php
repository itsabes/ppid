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

                </div>
                <div class='box-body'>
                    <div id="data_formulir" class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Keberatan</th>
                                    <th>Rincian Permohonan</th>
                                    <th>Alasan Keberatan</th>
                                    <th>Tanggal Keberatan</th>
                                    <th>Jawaban Sie/Subbag</th>
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
                                        <td><?= $formulir->NomorKeberatan ?></td>
                                        <td><?= $formulir->RincianInformasi ?></td>
                                        <td><?= $formulir->AlasanKeberatan ?></td>
                                        <td><?= $formulir->KeberatanDate ?></td>
                                        <td>
                                            <?php
                                            if (!empty($formulir->ResponseKeberatan)) {
                                                echo $formulir->ResponseKeberatan . '<br><br> Oleh : <b>' . $formulir->username . '</b> pada ' . $formulir->ResponseKeberatanDate;
                                            } else {
                                                echo "<button class='btn btn-sm btn-danger'>Belum Dibuatkan Jawaban</button>";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align:center" width="140px">
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
                            <td class="col-md-3" colspan="2">Nomor Keberatan
                                <input class="form-control" name="NomorKeberatan" id="NomorKeberatan" placeholder="" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Rincian Permohonan
                                <textarea class="form-control" name="RincianInformasi" disabled id="RincianInformasi" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3" colspan="2">Alasan Keberatan
                                <textarea class="form-control" name="AlasanKeberatan" disabled id="AlasanKeberatan" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </td>
                        </tr>

                        <!--
                        <?php if ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "sekpim") { ?> 
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
                            </td>
                        </tr>
                        <?php } ?>
                        -->

                        <?php if ($this->session->userdata('level') == "admin" or $this->session->userdata('level') == "operator") { ?>
                            <tr>
                                <td class="col-md-3" colspan="2">Jawaban dari PPID
                                    <textarea class="form-control" name="Response" id="Response" placeholder="Submit Jawaban dari PPID di sini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </td>
                            </tr>
                        <?php } ?>

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
                <a href="javascript:void(0)" onclick="submitDocClick()" class="btn btn-md btn-primary float-right"><i class="fa fa-check"></i> &nbsp;&nbsp;SUBMIT JAWABAN</a>
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
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true
        });
    });

    function editClick(id) {
        $.ajax({
            url: "<?= base_url('formulir/edit') ?>/" + id,
            success: function(e) {
                var r = eval("(" + e + ")");
                $("#IdFormulir").val(r.IdFormulir)
                $("#NomorKeberatan").val(r.NomorKeberatan)
                $("#Kategori").val(r.Kategori)
                $("#RincianInformasi").val(r.RincianInformasi)
                $("#TujuanInformasi").val(r.TujuanInformasi)
                $("#AlasanKeberatan").val(r.AlasanKeberatan)
                $("#Response").val(r.Response)

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
            url: "<?= base_url('formulir/store_response_keberatan') ?>",
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